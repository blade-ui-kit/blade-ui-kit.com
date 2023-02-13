<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /** @test */
    public function users_can_visit_the_homepage(): void
    {
        $this->get('/')
            ->assertSee('Blade UI Kit');
    }
}
