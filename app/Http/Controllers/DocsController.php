<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Documentation;

final class DocsController
{
    public function __invoke(Documentation $docs, string $version = null, string $page = null)
    {
        if ($version === null || $page === null) {
            $version ??= 'master';
            $page ??= 'introduction';

            return redirect()->route('docs', [$version, $page]);
        }

        if (! $docs->exists($path = resource_path("docs/{$version}/{$page}.md"))) {
            abort(404);
        }

        $markdown = $docs->get($path);

        return view('docs.index', compact('version', 'page', 'markdown'));
    }
}
