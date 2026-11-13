require 'tmpdir'
require 'open3'
require 'fileutils'

checker = File.expand_path('check-pinned-actions.rb', __dir__)
sha = 'a' * 40
digest = 'b' * 64
cases = {
  'commit and subpath' => ["uses: actions/cache/restore@#{sha}", true],
  'reusable workflow' => ["jobs: {test: {uses: owner/repo/.github/workflows/test.yml@#{sha}}}", true],
  'docker digest' => ["uses: docker://alpine:3@sha256:#{digest}", true],
  'local action' => ['uses: ./.github/actions/test', true],
  'local workflow' => ['uses: ./.github/workflows/test.yml', true],
  'tag' => ['uses: actions/checkout@v2', false],
  'branch' => ['jobs: {test: {uses: owner/repo/.github/workflows/test.yml@main}}', false],
  'short SHA' => ['uses: actions/checkout@abcdef0', false],
  'long SHA' => ["uses: actions/checkout@#{sha}a", false],
  'nonhex SHA' => ["uses: actions/checkout@#{'z' * 40}", false],
  'quoted flow mapping' => ['steps: [{"uses": "actions/checkout@v2"}]', false],
  'multiline scalar' => ["uses: >-\n  actions/checkout@v2", false],
  'alias' => ["action: &action actions/checkout@v2\nuses: *action", false],
  'docker tag' => ['uses: docker://alpine:3', false],
  'docker short digest' => ['uses: docker://alpine@sha256:abcdef', false],
  'docker commit instead of digest' => ["uses: docker://alpine@#{sha}", false],
  'dot prefix bypass' => ['uses: .evil/repo@main', false],
  'parent path' => ['uses: ./../action', false],
  'null reference' => ['uses: null', false],
  'invalid YAML' => ['steps: [', false],
  'run text is not an action' => ['run: "echo uses: actions/checkout@v2"', true]
}

Dir.mktmpdir('pinned-actions') do |directory|
  fixture = File.join(directory, 'workflow.yml')
  cases.each do |name, (yaml, expected)|
    File.write(fixture, yaml)
    output, status = Open3.capture2e('ruby', checker, fixture)
    raise "#{name}: expected success=#{expected}, got #{status.exitstatus}: #{output}" unless status.success? == expected
  end

  # Exercise default discovery, including new files and nested local composites.
  _, status = Open3.capture2e('git', 'init', '-q', directory)
  raise 'Could not create fixture repository' unless status.success?
  FileUtils.mkdir_p(File.join(directory, '.github/workflows'))
  FileUtils.mkdir_p(File.join(directory, 'local/action'))
  File.write(File.join(directory, '.github/workflows/test.yaml'), 'uses: ./local/action')
  metadata = File.join(directory, 'local/action/action.yml')
  File.write(metadata, 'runs: {using: composite, steps: [{uses: actions/checkout@v2}]}')
  output, status = Open3.capture2e('ruby', checker, chdir: directory)
  raise "Local composite escaped checking: #{output}" if status.success?
  File.write(metadata, "runs: {using: composite, steps: [{uses: actions/checkout@#{sha}}]}")
  output, status = Open3.capture2e('ruby', checker, chdir: directory)
  raise "Pinned local composite rejected: #{output}" unless status.success?
end

puts "Pin policy: #{cases.length + 2} acceptance/rejection cases passed."
