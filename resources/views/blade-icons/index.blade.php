<x-layout title="Blade Icons">
    <x-navigation/>

    @include('welcome.blade-icons')

    <div class="mt-16 max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center w-full">
            <img class="h-20 inline-block" src="{{ asset('images/showcase/cloudways-long.png') }}" alt="">
        </div>

        <div class="mt-16 max-w-4xl mx-auto text-center">
            <x-h3>
                Search for an icon
            </x-h3>

            <x-p>
                With {{ App\Models\IconSet::count() }} different icon sets, we probably can find the right one for you.
            </x-p>
        </div>
    </div>

    <div id="search" class="relative flex items-center justify-between max-w-screen-2xl px-4 mt-6 p-8 sm:mt-0 mx-auto sm:px-6">
        <livewire:icon-search/>
    </div>

    <x-footer/>
</x-layout>
