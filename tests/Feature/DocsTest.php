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
            $mock->shouldReceive('get')->with(resource_path('docs/master/foo.md'))->andReturn('## Foo title');
            $mock->shouldReceive('get')->with(resource_path('docs/master/toc.json'))->andReturn($this->toc());
        });

        $this->get('/docs/master/foo')
            ->assertSee('<h2>Foo title</h2>', false);
    }

    /** @test */
    public function default_page_redirects_to_master()
    {
        $this->get('/docs')
            ->assertRedirect('/docs/master/introduction');
    }

    /** @test */
    public function non_existing_versions_throw_a_404()
    {
        $this->get('/docs/foo')
            ->assertStatus(404);
    }

    private function toc()
    {
        return  <<<JSON
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
