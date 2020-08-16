<div class="w-full">
    <div class="relative flex items-center w-full mb-6">
        <div class="flex items-center w-full rounded-lg shadow-lg">
            <input
                class="block w-full p-4 text-xl border border-gray-500 rounded-lg"
                autocapitalize="off"
                autocomplete="off"
                autocorrect="off"
                spellcheck="false"
                type="text"
                placeholder="Search icons for&hellip;"
                wire:model.debounce.400ms="search"
            >
            <div class="absolute inset-y-0 right-0 flex items-center justify-center mr-5">
                <div wire:loading>
                    <x-icon-refresh class="inline w-6 h-6 text-gray-500 fill-current animate-spin"></x-icon-refresh>
                </div>
                <div wire:loading.remove>
                    <button wire:click="resetSearch">
                        @if($search)
                            <x-icon-close class="inline w-6 h-6 text-gray-500 transition duration-300 ease-in-out fill-current hover:text-scarlet-500"></x-icon-close>
                        @else
                            <x-icon-refresh class="inline w-6 h-6 text-gray-500 transition duration-300 ease-in-out fill-current hover:text-scarlet-500"></x-icon-refresh>
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div>
        @if($search)
            <div class="mb-5">
                <span class="text-gray-500">Found:</span> {{ trans_choice('app.icons-result', count($icons)) }}
            </div>
        @endif
        <div class="grid gap-3 row-gap-3 grid-col-2 xs:grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            @foreach($icons as $icon)
                <div
                    class="flex flex-col items-center"
                    wire:key="result_{{$icon->id}}"
                >
                    <a
                        href="{{ route('blade-icon', $icon) }}"
                        class="flex flex-col items-center justify-between w-full h-full p-2 transition duration-300 ease-in-out border border-gray-100 rounded-lg lg:h-24 hover:border-gray-500"
                    >
                        {{ svg($icon->name, 'w-12 h-12') }}
                        <span class="text-center">{{ $icon->name }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
