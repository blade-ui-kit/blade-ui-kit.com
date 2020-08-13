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
        return view('livewire.icon-search', [
            'icons' => Icon::query()->when($this->search !== '', function ($query) {
                Str::of($this->search)->lower()->explode(' ')->filter()->each(function (string $term) use ($query) {
                    $query->where('keywords', 'like', "-%{$term}%-");
                });
            }, function ($query) {
                $query->inRandomOrder();
            })->limit(500)->get()
        ]);
    }
}