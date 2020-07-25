@extends('layouts.base')

@section('body')
    <div class="relative bg-white overflow-hidden">
        <div class="relative pt-6 pb-10">
            @include('layouts.navigation')
        </div>
    </div>

    <div class="max-w-screen-xl mx-auto px-4 lg:px-6 py-6">
        <div class="lg:grid lg:grid-cols-5 lg:gap-10">
            <nav>
                <div>
                    <a href="#" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-900 rounded-md bg-gray-100 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 transition ease-in-out duration-150" aria-current="page">
                        <x-heroicon-o-book-open class="flex-shrink-0 -ml-1 mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150" />
                        <span class="truncate">
                            Documentation
                        </span>
                    </a>
                    <a href="#" class="mt-1 group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:bg-gray-100 transition ease-in-out duration-150">
                        <x-heroicon-o-chat-alt-2 class="flex-shrink-0 -ml-1 mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150" />
                        <span class="truncate">
                            Community
                        </span>
                    </a>
                </div>

                <div class="mt-8">
                    <h3 class="px-3 text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider" id="projects-headline">
                        Getting Started
                    </h3>
                    <div class="mt-1" role="group" aria-labelledby="projects-headline">
                        <a href="#" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:bg-gray-100 transition ease-in-out duration-150">
                            <span class="truncate">
                                Installation
                            </span>
                        </a>
                        <a href="#" class="mt-1 group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:bg-gray-100 transition ease-in-out duration-150">
                            <span class="truncate">
                                Release Notes
                            </span>
                        </a>
                        <a href="#" class="mt-1 group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:bg-gray-100 transition ease-in-out duration-150">
                            <span class="truncate">
                                Upgrade Guide
                            </span>
                        </a>
                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="px-3 text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider" id="projects-headline">
                        Editors
                    </h3>
                    <div class="mt-1" role="group" aria-labelledby="projects-headline">
                        <a href="#" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:bg-gray-100 transition ease-in-out duration-150">
                            <span class="truncate">
                                Easy MDE
                            </span>
                        </a>
                        <a href="#" class="mt-1 group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:bg-gray-100 transition ease-in-out duration-150">
                            <span class="truncate">
                                Trix
                            </span>
                        </a>
                    </div>
                </div>
            </nav>

            <x-markdown class="lg:col-span-3 px-3 lg:px-0 mt-6 lg:mt-0 prose lg:prose-lg" html-input="allow">
                {!! $markdown !!}
            </x-markdown>

            <div class="mt-8">
                <h3 class="px-3 text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider" id="projects-headline">
                    On this page
                </h3>

                <x-toc class="mt-1 toc" :url="route('docs', [$version, $page])">
                    {!! $markdown !!}
                </x-toc>
            </div>
        </div>
    </div>
@endsection
