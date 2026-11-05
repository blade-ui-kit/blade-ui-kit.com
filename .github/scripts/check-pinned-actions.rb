require 'yaml'
require 'open3'

# Parse YAML, rather than grepping lines, so quoted keys, flow mappings,
# multiline scalars and aliases cannot bypass the policy. Also check repository
# action metadata: a local composite action must not hide floating dependencies.
files = ARGV
if files.empty?
  output, status = Open3.capture2('git', 'ls-files', '-z', '--cached', '--others', '--exclude-standard')
  abort 'Could not list repository files' unless status.success?
  files = output.split("\0").select do |path|
    path.match?(%r{\A\.github/workflows/[^/]+\.ya?ml\z}) ||
      File.basename(path).match?(/\Aaction\.ya?ml\z/)
  end
end
abort 'No workflow or action files found' if files.empty?

errors = []
files.uniq.each do |file|
  begin
    data = YAML.safe_load(File.read(file), aliases: true)
    visited = {}
    walk = lambda do |node|
      return unless node.is_a?(Hash) || node.is_a?(Array)
      return if visited[node.object_id]
      visited[node.object_id] = true

      if node.is_a?(Hash)
        if node.key?('uses')
          reference = node['uses']
          local = reference.is_a?(String) &&
            reference.match?(%r{\A\./[A-Za-z0-9_./-]+\z}) &&
            (reference.delete_prefix('./').split('/') & ['.', '..']).empty?
          pinned = reference.is_a?(String) && (
            reference.match?(%r{\A[A-Za-z0-9_.-]+/[A-Za-z0-9_.-]+(?:/[A-Za-z0-9_./-]+)?@[0-9a-fA-F]{40}\z}) ||
            reference.match?(%r{\Adocker://[^\s@]+@sha256:[0-9a-fA-F]{64}\z})
          )
          unless local || pinned
            errors << "#{file}: invalid uses: #{reference.inspect}; use a full commit SHA (with a version comment), docker://image@sha256:<64 hex>, or ./local/path"
          end
        end
        node.each_value { |value| walk.call(value) }
      else
        node.each { |value| walk.call(value) }
      end
    end
    walk.call(data)
  rescue Psych::Exception, SystemCallError => error
    errors << "#{file}: #{error.message}"
  end
end

abort errors.join("\n") unless errors.empty?
puts "All action and reusable workflow references are pinned (#{files.uniq.length} files checked)."
