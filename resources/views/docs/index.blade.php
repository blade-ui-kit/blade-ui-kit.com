@extends('layouts.base')

@section('body')
    <x-navigation />

    <div class="max-w-screen-xl mx-auto px-4 lg:px-6 py-6">
        <div class="lg:grid lg:grid-cols-5 lg:gap-10">
            <x-docs.navigation :sections="$sections" :current="$page" :version="$version" />

            <x-markdown anchors class="docs lg:col-span-3 px-3 lg:px-0 mt-6 lg:mt-0 prose lg:prose-lg">
                {!! $markdown !!}
            </x-markdown>

            <div class="mt-8">
                <h3 class="px-3 text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                    On this page
                </h3>

                <x-toc class="mt-1 toc" :url="route('docs', [$version, $page])">
                    {!! $markdown !!}
                </x-toc>
            </div>
        </div>
    </div>
@endsection
