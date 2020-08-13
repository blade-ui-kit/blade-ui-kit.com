<x-layout>
    <x-navigation/>

    <div class="relative max-w-screen-xl px-4 mx-auto sm:px-6">
        <x-h2>{{ $icon->name }}</x-h2>

        <div class="grid grid-cols-2">
            <div>
                {{ svg($icon->name, 'w-full') }}
            </div>
            <div>
                <x-code class="w-full">{!! $code !!}</x-code>
                <x-code>```bash
composer require {{ $icon->set->composer }}
```</x-code>
            </div>
        </div>

    </div>

    <x-footer/>
</x-layout>
