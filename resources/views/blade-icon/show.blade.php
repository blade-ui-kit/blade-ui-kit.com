<x-layout>
    <x-navigation/>

    <div class="relative max-w-screen-xl px-4 mx-auto sm:px-6">
        <x-h2>
            <span class="text-gray-300">{{ $icon->set->name }} / </span>{{ $icon->name }}
        </x-h2>

        <div class="flex flex-col items-center justify-around w-full lg:flex-row">
            <div class="flex items-center justify-around lg:items-start">
                {{ svg($icon->name, 'w-4 h-4') }}
                {{ svg($icon->name, 'w-8 h-8') }}
                {{ svg($icon->name, 'w-16 h-16') }}
                {{ svg($icon->name, 'w-32 h-32') }}
                {{ svg($icon->name, 'w-64 h-64') }}
            </div>

            <div class="flex flex-col w-full">
                <div class="flex flex-col items-center lg:items-start">
                    <x-code>
                        {!! $code !!}
                    </x-code>
                    <div class="flex flex-row mt-2 space-x-4">
                        <button class="px-2 py-1 text-left text-red-600 transition duration-300 ease-in-out border border-red-600 rounded-lg hover:bg-scarlet-500 hover:text-white hover:border-scarlet-500">Copy &lt;/&gt;</button>
                        <button class="px-2 py-1 text-left text-red-600 transition duration-300 ease-in-out border border-red-600 rounded-lg hover:bg-scarlet-500 hover:text-white hover:border-scarlet-500">Copy &#64;svg</button>
                        <button class="px-2 py-1 text-left text-red-600 transition duration-300 ease-in-out border border-red-600 rounded-lg hover:bg-scarlet-500 hover:text-white hover:border-scarlet-500">Copy &#123;&#123; &#125;&#125;</button>
                    </div>
                </div>

                <div class="flex flex-col items-center lg:items-start">
                    <x-code class="">```bash
$ composer require {{ $icon->set->composer }}
```
                    </x-code>
                    <div class="flex flex-row mt-2 space-x-4">
                        <button class="px-2 py-1 text-left text-red-600 transition duration-300 ease-in-out border border-red-600 rounded-lg hover:bg-scarlet-500 hover:text-white hover:border-scarlet-500">Copy $</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <x-h3>Similar icons</x-h3>
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

    <x-footer/>
</x-layout>
