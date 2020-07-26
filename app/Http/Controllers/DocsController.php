<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Documentation;

final class DocsController
{
    private const DEFAULT_VERSION = 'main';
    private const DEFAULT_PAGE = 'introduction';
    private const EXCLUDED = ['readme'];

    public function __invoke(Documentation $docs, string $version = null, string $page = null)
    {
        if ($page === null) {
            if ($version !== null) {
                return redirect()->route('docs', [self::DEFAULT_VERSION, $version]);
            }

            return redirect()->route('docs', [self::DEFAULT_VERSION, self::DEFAULT_PAGE]);
        }

        if (! $docs->exists($version, $page) || in_array($page, self::EXCLUDED)) {
            abort(404);
        }

        $sections = $docs->toc($version);
        $markdown = $docs->get($version, $page);
        $title = $docs->title($markdown);

        return view('docs', compact('version', 'page', 'sections', 'title', 'markdown'));
    }
}
