<?php

declare(strict_types=1);

namespace App;

use Illuminate\Filesystem\Filesystem;

final class Documentation
{
    private Filesystem $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function exists(string $path): bool
    {
        return $this->filesystem->exists($path);
    }

    public function get(string $path): string
    {
        return $this->filesystem->get($path);
    }
}
