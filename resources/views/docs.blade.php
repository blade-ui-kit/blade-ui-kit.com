<x-layout :title="$title">
    <x-navigation/>

    <div class="max-w-screen-xl mx-auto px-4 lg:px-6 py-6 lg:grid lg:grid-cols-5 lg:gap-10">
        <x-docs.navigation :sections="$sections" :current="$page" :version="$version"/>

        <x-markdown anchors class="docs lg:col-span-3 px-3 lg:px-0 mt-8 lg:mt-0 prose lg:prose-lg">
            {!! $markdown !!}
        </x-markdown>

        <div class="mt-8">
            <x-h6>
                On this page
            </x-h6>

            <x-toc class="mt-1 toc">
                {!! $markdown !!}
            </x-toc>
        </div>
    </div>

    <x-footer/>
</x-layout>
