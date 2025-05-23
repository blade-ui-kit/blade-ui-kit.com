<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /** @test */
    public function users_can_visit_the_icons_page(): void
    {
        $this->get('/blade-icons')
            ->assertSee('Blade Icons');
    }
}
