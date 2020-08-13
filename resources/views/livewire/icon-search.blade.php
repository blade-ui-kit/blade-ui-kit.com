<div>
    <div class="relative z-0 flex items-center w-full mt-12">
        <div class="absolute flex items-center w-full mb-4 rounded-lg shadow-lg">
            <input 
                class="block w-full p-4 text-xl border border-gray-500 rounded-lg" 
                autocapitalize="off" 
                autocomplete="off" 
                autocorrect="off" 
                spellcheck="false" 
                type="text" 
                wire:model="search"
            >
            <div class="absolute inset-y-0 right-0 flex items-center justify-center mr-5">
                <button @click="search = ''">
                    <x-icon-close class="inline w-6 h-6 text-gray-500 transition duration-300 ease-in-out fill-current hover:text-scarlet-500"></x-icon-close>
                </button>
            </div>
        </div>
    </div>

    <div class="mt-10">
    @if($search)
        <div class="mb-5">
            <span class="text-gray-500">Found:</span> {{ count($icons) }}
        </div>
    @endif

        <div class="grid gap-3 row-gap-3 grid-col-2 xs:grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            @foreach($icons as $icon)
                <div class="flex flex-col items-center p-2 border border-gray-100 rounded-lg" wire:key="result_{{$icon->id}}">
                    <a href="{{ route('blade-icon', $icon) }}" class="flex flex-col items-center justify-between w-full h-full lg:h-24">
                        {{ svg($icon->name, 'w-12 h-12', ['wire:key="svg_'.$icon->id.'"']) }}
                        <span class="text-center">{{ $icon->name }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
