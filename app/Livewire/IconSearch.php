<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Icon;
use App\Models\IconSet;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Url;
use Livewire\Component;

final class IconSearch extends Component
{
    #[Url]
    public string $search = '';

    #[Url]
    public string $selectedSet = '';

    public function resetSearch(): void
    {
        $this->reset('search');
    }

    public function render(): View
    {
        return view('livewire.icon-search', [
            'total' => Icon::query()->withSet($this->selectedSet)->count(),
            'icons' => $this->icons(),
            'sets' => IconSet::orderBy('name')->get(),
        ]);
    }

    protected function icons(): Collection
    {
        if ($this->shouldShowRandomIcons()) {
            return Icon::query()
                ->withSet($this->selectedSet)
                ->inRandomOrder()
                ->take(80)
                ->get();
        }

        return Icon::search($this->search)
            ->when(! empty($this->selectedSet), fn ($query) => $query->where('icon_set_id', $this->selectedSet))
            ->take(500)
            ->get();
    }

    protected function shouldShowRandomIcons(): bool
    {
        return empty(trim($this->search));
    }
}
