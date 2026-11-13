<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use League\CommonMark\CommonMarkConverter;

final class Markdown extends Component
{
    public function __construct(public bool $anchors = false) {}

    public function render(): View
    {
        return view('components.markdown');
    }

    public function toHtml(string $markdown): string
    {
        if ($this->anchors) {
            // Leave headings inside fenced code blocks untouched.
            preg_match_all('(```[a-z]*\n[\s\S]*?\n```)', $markdown, $matches);

            foreach ($matches[0] as $index => $block) {
                $markdown = str_replace($block, "<!--code-block-$index-->", $markdown);
            }

            $markdown = preg_replace_callback('/^#{2,6} (.+)$/m', function (array $match) {
                return '<a class="anchor" name="'.Str::slug(trim($match[1])).'"></a>'.PHP_EOL.$match[0];
            }, $markdown);

            foreach ($matches[0] as $index => $block) {
                $markdown = str_replace("<!--code-block-$index-->", $block, $markdown);
            }
        }

        return (string) (new CommonMarkConverter)->convert($markdown);
    }
}
