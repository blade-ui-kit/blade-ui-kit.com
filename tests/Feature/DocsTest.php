<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Filesystem\Filesystem;
use Tests\TestCase;

class DocsTest extends TestCase
{
    /** @test */
    public function users_can_visit_the_docs()
    {
        $this->partialMock(Filesystem::class, function ($mock) {
            $mock->shouldReceive('exists')->andReturn(true);
            $mock->shouldReceive('get')->with(resource_path('docs/main/foo.md'))->andReturn('## Foo title');
            $mock->shouldReceive('get')->with(resource_path('docs/main/toc.json'))->andReturn($this->toc());
        });

        $this->get('/docs/main/foo')
            ->assertSee('<h2>Foo title</h2>', false);
    }

    /** @test */
    public function default_page_redirects_to_main()
    {
        $this->get('/docs')
            ->assertRedirect('/docs/main/introduction');
    }

    /** @test */
    public function pages_without_version_redirect_to_default_version()
    {
        $this->get('/docs/introduction')
            ->assertRedirect('/docs/main/introduction');
    }

    /** @test */
    public function non_existing_versions_throw_a_404()
    {
        $this->get('/docs/foo/bar')
            ->assertStatus(404);
    }

    /** @test */
    public function excluded_pages_throw_a_404()
    {
        $this->get('/docs/main/readme')
            ->assertStatus(404);
    }

    private function toc(): string
    {
        return <<<JSON
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
