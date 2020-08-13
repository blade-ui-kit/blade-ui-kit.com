<div>
    <div class="relative flex items-center">
        <label class="rounded-75 shadow-lg w-full border mb-4">
            <input class="block w-full text-xl p-4" autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false"
                   type="text" wire:model="search">
        </label>
    </div>

    @if($search)
        <div>
            Found: {{ count($icons) }}
        </div>
    @endif

    <div class="grid grid-col-2 xs:grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
        @foreach($icons as $icon)
            <div class="flex flex-col items-center">
                <a href="{{ route('blade-icon', $icon) }}">
                    {{ svg($icon->name, 'w-8 h-8') }}
                </a>
                <span>{{ $icon->name }}</span>
            </div>
        @endforeach
    </div>
</div>
