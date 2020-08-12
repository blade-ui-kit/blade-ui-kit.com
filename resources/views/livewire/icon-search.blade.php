<div>
    <div class="relative flex items-center">
        <label class="rounded-75 shadow-lg w-full border mb-4">
            <input class="block w-full text-xl p-4" autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false"
                   type="text" wire:model="search">
        </label>
    </div>

    <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
        @foreach($icons as $icon)
            <div class="flex flex-col items-center">
                {{ svg($icon->name, 'w-16 h-16') }}
                <pre>&lt;x-{{ $icon->name }} /&gt;</pre>
            </div>
        @endforeach
    </div>
</div>
