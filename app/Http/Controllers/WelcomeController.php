<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Number;

final class WelcomeController
{
    public function __invoke()
    {
        $components = count(config('blade-ui-kit.components'));
        $downloads = Number::abbreviate((int) cache()->remember('downloads', 1800, function () {
            $response = Http::retry(3, 100)
                ->get('https://packagist.org/packages/blade-ui-kit/blade-ui-kit.json');

            return $response['package']['downloads']['total'] ?? 0;
        }), 2);
        $contributors = cache()->remember('contributors', 1800, function () {
            $response = Http::retry(3, 100)
                ->get('https://api.github.com/repos/blade-ui-kit/blade-ui-kit/contributors?anon=1');

            return count($response->json());
        });

        return view('welcome', compact('components', 'downloads', 'contributors'));
    }
}
