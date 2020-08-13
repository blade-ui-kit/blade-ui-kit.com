<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Icon;

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
        ]);
    }
}
