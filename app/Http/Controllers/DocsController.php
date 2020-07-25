<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Documentation;

final class DocsController
{
    private const DEFAULT_VERSION = 'master';

    public function __invoke(Documentation $docs, string $version = null, string $page = null)
    {
        if ($page === null) {
            if ($version !== null) {
                return redirect()->route('docs', [self::DEFAULT_VERSION, $version]);
            }

            $version = self::DEFAULT_VERSION;
            $page = 'introduction';

            return redirect()->route('docs', [$version, $page]);
        }

        if (! $docs->exists($version, $page)) {
            abort(404);
        }

        $sections = $docs->toc($version);
        $markdown = $docs->get($version, $page);

        return view('docs.index', compact('version', 'page', 'sections', 'markdown'));
    }
}
