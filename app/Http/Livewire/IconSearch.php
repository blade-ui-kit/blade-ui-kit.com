<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\Icon;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class IconSearch extends Component
{
    public string $search = '';

    protected $updatesQueryString = [
        'search' => ['except' => ''],
    ];

    public function mount(): void
    {
        $this->search = (string) request()->query('search', $this->search);
    }

    public function resetSearch(): void
    {
        $this->reset('search');
    }

    public function render(): View
    {
        return view('livewire.icon-search', [
            'icons' => Icon::search($this->search),
        ]);
    }
}
