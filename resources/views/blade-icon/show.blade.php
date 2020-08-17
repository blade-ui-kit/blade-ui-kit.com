<x-layout>
    <x-navigation/>

    <div class="relative max-w-screen-xl px-4 mx-auto sm:px-6">
        <x-h2>
            <span class="text-gray-300">{{ $icon->set->name }} / </span>{{ $icon->name }}
        </x-h2>

        <div class="flex flex-col items-stretch justify-around w-full lg:flex-row">
            <div class="flex flex-col w-full pr-5 mt-2 mr-10 space-y-1 md:w-1/2 lg:items-start lg:ml-2 lg:flex-col lg:mt-0 lg:w-1/3">
                <div>
                    <x-h5>Install through composer</x-h5>
                    <x-markdown class="block max-w-full mt-3 overflow-scroll text-xs font-medium prose bg-gray-700 rounded sm:inline-block sm:mt-6 text-gray-50 sm:text-base lg:prose-lg">```
composer require {{ $icon->set->composer }}
```</x-markdown>
                </div>                  

                <div>
                    <x-h5>Use as component</x-h5>
                    <x-markdown class="block max-w-full mt-3 overflow-scroll text-xs font-medium prose bg-gray-700 rounded sm:inline-block sm:mt-6 text-gray-50 sm:text-base lg:prose-lg">```
<x-{{ $icon->name }} />
```</x-markdown>
                </div>

                <div>
                    <x-h5>Use as helper</x-h5>
                    <x-markdown class="block max-w-full mt-3 overflow-scroll text-xs font-medium prose bg-gray-700 rounded sm:inline-block sm:mt-6 text-gray-50 sm:text-base lg:prose-lg">```
@verbatim @svg(@endverbatim'{{ $icon->name }}@verbatim')@endverbatim
```</x-markdown>
                </div>
                
                <div>
                    <x-h5>Use as function</x-h5>
                    <x-markdown class="block max-w-full mt-3 overflow-scroll text-xs font-medium prose bg-gray-700 rounded sm:inline-block sm:mt-6 text-gray-50 sm:text-base lg:prose-lg">```
@verbatim {{ svg(@endverbatim' {{ $icon->name }}@verbatim') }} @endverbatim
```</x-markdown>
                </div>
            </div>

            <div class="flex items-center justify-center w-full py-12 bg-gray-100 lg:w-2/3">
                {{ svg($icon->name, 'w-64 h-64') }}
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
