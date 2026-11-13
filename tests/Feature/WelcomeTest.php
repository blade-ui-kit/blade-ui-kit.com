<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_can_visit_the_icons_page(): void
    {
        $this->get('/blade-icons')
            ->assertOk()
            ->assertSee('Blade Icons');
    }
}
