<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Icon;
use Illuminate\Support\Str;

final class BladeIconController
{
    public function __invoke(Icon $icon)
    {
        return view('blade-icon.show', [
            'icon' => $icon,
            'code' => "```html
<x-{$icon->name} />
@svg('{$icon->name}')
{{ svg('{$icon->name}') }}
```",
            'icons' => Icon::where(function ($query) use ($icon) {
                Str::of($icon->keywords)->explode('-')->filter()->each(function (string $term) use ($query) {
                    $query->orWhere('keywords', 'like', "-%{$term}%-");
                });
            })->where('id', '!=', $icon->id)->inRandomOrder()->limit(20)->get(),
        ]);
    }
}
