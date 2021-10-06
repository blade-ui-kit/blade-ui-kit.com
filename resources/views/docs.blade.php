<x-layout :title="$title">
    <x-navigation/>

    <div class="max-w-screen-xl mx-auto px-4 lg:px-6 py-6 lg:grid lg:grid-cols-5 lg:gap-10">
        <div class="text-center lg:hidden pb-8">
            <a href="https://www.cloudways.com/en/laravel-hosting?id=994072&data1=bladeUIkit&data2=banner" target="_blank" rel="noopener noreferrer">
                <img class="w-full max-w-4xl hidden sm:inline-block" src="{{ asset('images/showcase/cloudways-long.jpg') }}" alt="">
                <img class="inline-block sm:hidden w-full max-w-xs" src="{{ asset('images/showcase/cloudways-small.jpg') }}" alt="">
            </a>
        </div>

        <x-docs.navigation :sections="$sections" :current="$page" :version="$version"/>

        <x-markdown anchors class="docs lg:col-span-3 px-3 lg:px-0 mt-8 lg:mt-0 prose lg:prose-lg">
            {!! $markdown !!}
        </x-markdown>

        <div>
            <a class="hidden lg:inline" href="https://www.cloudways.com/en/laravel-hosting?id=994072&data1=bladeUIkit&data2=banner" target="_blank" rel="noopener noreferrer">
                <img class="w-full" src="{{ asset('images/showcase/cloudways-small.jpg') }}" alt="">
            </a>

            <x-h6 class="mt-8">
                On this page
            </x-h6>

            <x-toc class="mt-1 toc">
                {!! $markdown !!}
            </x-toc>
        </div>
    </div>

    <x-footer/>
</x-layout>
