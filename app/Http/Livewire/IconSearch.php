<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\Icon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

final class IconSearch extends Component
{
    public string $search = '';

    protected $queryString = [
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
            'total' => Icon::count(),
            'icons' => $this->icons(),
        ]);
    }

    protected function icons(): Collection
    {
        if ($this->shouldShowRandomIcons()) {
            return Icon::query()
                ->inRandomOrder()
                ->take(72)
                ->get();
        }

        return Icon::search($this->search)
            ->take(500)
            ->get();
    }

    protected function shouldShowRandomIcons(): bool
    {
        return empty(trim($this->search));
    }
}
