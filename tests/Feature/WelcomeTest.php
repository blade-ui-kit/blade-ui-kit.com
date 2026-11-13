<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Blade;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_visit_the_icons_page(): void
    {
        $this->get('/blade-icons')
            ->assertOk()
            ->assertSee('Blade Icons')
            ->assertSee('<title>Blade Icons - Laravel</title>', false)
            ->assertSee('<meta property="og:title" content="Blade Icons - Laravel">', false)
            ->assertDontSee('@bukStyles')
            ->assertDontSee('@bukScripts');
    }

    public function test_local_markdown_and_toc_keep_code_examples_and_heading_links(): void
    {
        $markdown = "## Getting Started\n\n### Installation\n\n```blade\n<x-icon name=\"heroicon-o-heart\" />\n## Not a heading\n```";

        $html = Blade::render('<x-markdown anchors>{!! $markdown !!}</x-markdown><x-toc>{!! $markdown !!}</x-toc>', compact('markdown'));

        $this->assertStringContainsString('<a class="anchor" name="getting-started"></a>', $html);
        $this->assertStringContainsString('<a class="anchor" name="installation"></a>', $html);
        $this->assertStringContainsString('href="#getting-started"', $html);
        $this->assertStringContainsString('href="#installation"', $html);
        $this->assertStringContainsString('&lt;x-icon name=&quot;heroicon-o-heart&quot; /&gt;', $html);
        $this->assertStringNotContainsString('name="not-a-heading"', $html);
        $this->assertStringNotContainsString('href="#not-a-heading"', $html);
    }
}
