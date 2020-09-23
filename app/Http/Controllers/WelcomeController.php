<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

final class WelcomeController
{
    public function __invoke()
    {
        $components = count(config('blade-ui-kit.components'));
        $downloads = cache()->remember('downloads', 1800, function () {
            return Http::get('https://packagist.org/packages/blade-ui-kit/blade-ui-kit.json')['package']['downloads']['total'];
        });
        $contributors = cache()->remember('contributors', 1800, function () {
            return count(Http::get('https://api.github.com/repos/blade-ui-kit/blade-ui-kit/contributors?anon=1')->json());
        });

        return view('welcome', compact('components', 'downloads', 'contributors'));
    }
}
