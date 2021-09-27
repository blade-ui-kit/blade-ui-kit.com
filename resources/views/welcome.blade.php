<x-layout>
    <x-navigation>
        @include('welcome.hero')
    </x-navigation>

    <div class="pt-24 pb-16 text-center w-full">
        <img class="h-20 inline-block" src="{{ asset('images/showcase/cloudways-long.png') }}" alt="">
    </div>

    @include('welcome.stats')

    @include('welcome.features')

    @include('welcome.tall-stack')

    @include('welcome.testimonials')

    @include('welcome.blade-icons')

    @include('welcome.quote')

    <x-footer/>
</x-layout>
