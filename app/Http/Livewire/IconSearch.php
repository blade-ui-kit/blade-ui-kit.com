<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\Icon;
use App\Models\IconSet;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

final class IconSearch extends Component
{
    public string $search = '';
    public string $setId = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'setId' => ['except' => ''],
    ];

    public function mount(): void
    {
        $this->search = (string) request()->query('search', $this->search);
        $this->setId = (string) request()->query('setId', $this->setId);
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
            'sets' => IconSet::orderBy('name')->get(),
        ]);
    }

    protected function icons(): Collection
    {
        if ($this->shouldShowRandomIcons()) {
            return Icon::query()
                ->when(! empty($this->setId), fn($query) => $query->where('icon_set_id', $this->setId))
                ->inRandomOrder()
                ->take(72)
                ->get();
        }

        return Icon::search($this->search)
            ->when(! empty($this->setId), fn($query) => $query->where('icon_set_id', $this->setId))
            ->take(500)
            ->get();
    }

    protected function shouldShowRandomIcons(): bool
    {
        return empty(trim($this->search));
    }
}
