<?php

declare(strict_types=1);

namespace App;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

final class Documentation
{
    private Filesystem $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function exists(string $version, string $page): bool
    {
        return $this->filesystem->exists(resource_path("docs/{$version}/{$page}.md"));
    }

    public function get(string $version, string $page): string
    {
        return $this->filesystem->get(resource_path("docs/{$version}/{$page}.md"));
    }

    public function title(string $markdown): string
    {
        return Str::after(collect(explode(PHP_EOL, $markdown))->first(), '# ');
    }

    public function toc(string $version): array
    {
        return json_decode($this->filesystem->get($this->path($version, 'toc.json')), true);
    }

    private function path(string $version, string $file): string
    {
        return resource_path("docs/{$version}/{$file}");
    }
}
