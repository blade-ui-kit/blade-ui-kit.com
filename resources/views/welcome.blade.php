<x-layout>
    <x-navigation>
        @include('welcome.hero')
    </x-navigation>

    <div class="pt-24 pb-16 px-4 sm:px-6 lg:px-8 text-center w-full">
        <a href="https://www.cloudways.com/en/laravel-hosting?id=994072&data1=bladeUIkit&data2=banner" target="_blank" rel="noopener noreferrer">
            <img class="w-full max-w-4xl hidden sm:inline-block" src="{{ asset('images/showcase/cloudways-long.jpg') }}" alt="">
            <img class="inline-block sm:hidden w-full max-w-xs" src="{{ asset('images/showcase/cloudways-small.jpg') }}" alt="">
        </a>
    </div>

    @include('welcome.stats')

    @include('welcome.features')

    @include('welcome.tall-stack')

    @include('welcome.testimonials')

    @include('welcome.blade-icons')

    @include('welcome.quote')

    <x-footer/>
</x-layout>
