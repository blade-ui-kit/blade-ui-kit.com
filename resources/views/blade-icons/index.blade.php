<x-layout title="Blade Icons">
    <x-navigation/>

    @include('welcome.blade-icons')

    <div class="mt-16 max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center w-full">
            <a href="https://www.cloudways.com/en/laravel-hosting?id=994072&data1=bladeUIkit&data2=banner" target="_blank" rel="noopener noreferrer">
                <img class="w-full max-w-4xl hidden sm:inline-block" src="{{ asset('images/showcase/cloudways-long.jpg') }}" alt="">
                <img class="inline-block sm:hidden w-full max-w-xs" src="{{ asset('images/showcase/cloudways-small.jpg') }}" alt="">
            </a>
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
