<?php

namespace App\Providers;

use App\Models\IconSet;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('iconSetCount', $this->iconSetCount());
    }

    private function iconSetCount(): int
    {
        return cache()->remember('iconSetCount', 60 * 60 * 24, function (): int {
            return IconSet::count();
        });
    }
}
