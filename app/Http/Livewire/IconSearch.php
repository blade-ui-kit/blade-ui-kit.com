<?php

namespace App\Http\Livewire;

use App\Models\Icon;
use Illuminate\Support\Str;
use Livewire\Component;

class IconSearch extends Component
{
    public $search = 'arrow';

    public function render()
    {
        /**
         * Rendering styles
         * <x-ICONNAME />
         * @svg('ICONNAME')
         * {{ svg('ICONNAME') }}
         */
        return view('livewire.icon-search', [
            'icons' => Icon::query()->when($this->search !== '', function ($query) {
                $query->whereHas('keywords', function($keywords) {
                    Str::of($this->search)->lower()->explode(' ')->filter()->each(function (string $term) use ($keywords) {
                        $keywords->where('name', 'like', "%{$term}%");
                    });
                });
            }, function ($query) {
                $query->limit(500);
            })->get()
        ]);
    }
}
