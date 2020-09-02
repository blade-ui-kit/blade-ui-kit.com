<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

final class WelcomeController
{
    public function __invoke()
    {
        $downloads = cache()->remember('downloads', 14400, function () {
            return Http::get('https://packagist.org/packages/blade-ui-kit/blade-ui-kit.json')['package']['downloads']['total'];
        });

        return view('welcome', compact('downloads'));
    }
}
