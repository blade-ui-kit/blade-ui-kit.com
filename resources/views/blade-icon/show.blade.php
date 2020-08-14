<x-layout>
    <x-navigation/>

    <div class="relative max-w-screen-xl px-4 mx-auto sm:px-6">
        <x-h2>
            <span class="text-gray-300">{{ $icon->set->name }} / </span>{{ $icon->name }}
        </x-h2>

        <div class="flex flex-col items-stretch justify-around w-full lg:flex-row">
            <div class="flex items-center justify-center w-full py-12 bg-gray-100 lg:w-2/3">
                {{ svg($icon->name, 'w-64 h-64') }}
            </div>

            <div class="flex flex-col w-full mx-auto mt-2 space-y-10 md:w-1/2 lg:items-start lg:ml-2 lg:flex-col lg:mt-0 lg:w-1/3">
                <div class="relative w-full px-4 py-2 mr-3 font-mono text-red-600 border border-red-600 rounded-lg">
                    &lt;x-icon-{{ $icon->name }} /&gt;
                    <button class="absolute right-0 p-4 mt-2 -mr-6 text-white bg-red-600 rounded-full hover:bg-scarlet-500">
                        <x-icon-clipboard class="w-4 h-4 fill-current"></x-icon-clipboard>
                    </button>
                </div>
                <div class="relative w-full px-4 py-2 mr-3 font-mono text-red-600 border border-red-600 rounded-lg">
                    &#64;svg('{{ $icon->name }}', '')
                    <button class="absolute right-0 p-4 mt-2 -mr-6 text-white bg-red-600 rounded-full hover:bg-scarlet-500">
                        <x-icon-clipboard class="w-4 h-4 fill-current"></x-icon-clipboard>
                    </button>
                </div>
                <div class="relative w-full px-4 py-2 mr-3 font-mono text-red-600 border border-red-600 rounded-lg">
                    &#123;&#123; svg('{{ $icon->name }}') &#125;&#125;
                    <button class="absolute right-0 p-4 mt-2 -mr-6 text-white bg-red-600 rounded-full hover:bg-scarlet-500">
                        <x-icon-clipboard class="w-4 h-4 fill-current"></x-icon-clipboard>
                    </button>
                </div>
                <div class="relative w-full px-4 py-2 mr-3 font-mono text-red-600 border border-red-600 rounded-lg">
                    composer require {{ $icon->set->composer }}
                    <button class="absolute right-0 p-4 mt-2 -mr-6 text-white bg-red-600 rounded-full hover:bg-scarlet-500">
                        <x-icon-clipboard class="w-4 h-4 fill-current"></x-icon-clipboard>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="mt-10">
            <x-h3>Similar icons</x-h3>
            <div class="grid gap-3 row-gap-3 mt-5 grid-col-2 xs:grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
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

    <x-footer/>
</x-layout>
