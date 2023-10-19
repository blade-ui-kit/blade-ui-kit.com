<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Filesystem\Filesystem;
use Tests\TestCase;

class DocsTest extends TestCase
{
    /** @test */
    public function users_can_visit_the_docs(): void
    {
        $this->partialMock(Filesystem::class, function ($mock) {
            $mock->shouldReceive('exists')->andReturn(true);
            $mock->shouldReceive('get')->with(resource_path('docs/0.x/foo.md'))->andReturn('## Foo title');
            $mock->shouldReceive('get')->with(resource_path('docs/0.x/toc.json'))->andReturn($this->toc());
        });

        $this->get('/docs/0.x/foo')
            ->assertSee('<h2>Foo title</h2>', false);
    }

    /** @test */
    public function default_page_redirects_to_main(): void
    {
        $this->get('/docs')
            ->assertRedirect('/docs/0.x/introduction');
    }

    /** @test */
    public function pages_without_version_redirect_to_default_version(): void
    {
        $this->get('/docs/introduction')
            ->assertRedirect('/docs/0.x/introduction');
    }

    /** @test */
    public function non_existing_versions_throw_a_404(): void
    {
        $this->get('/docs/foo/bar')
            ->assertStatus(404);
    }

    /** @test */
    public function excluded_pages_throw_a_404(): void
    {
        $this->get('/docs/0.x/readme')
            ->assertStatus(404);
    }

    private function toc(): string
    {
        return <<<'JSON'
                [
                    {
                        "title": "Getting Started",
                        "pages": [
                            "installation",
                            "release-notes",
                            "upgrade-guide"
                        ]
                    }
                ]
            JSON;
    }
}
