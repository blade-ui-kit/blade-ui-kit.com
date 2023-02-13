<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Icon;
use Illuminate\View\View;

final class ShowIconController
{
    public function __invoke(Icon $icon): View
    {
        return view('blade-icons.show', [
            'icon' => $icon,
            'icons' => Icon::relatedIcons($icon),
        ]);
    }
}
