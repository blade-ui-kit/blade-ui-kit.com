<div id="features" class="pt-8 pb-16 bg-gray-50 overflow-hidden lg:pb-36">
    <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-screen-xl">
        <svg class="hidden lg:block absolute left-full transform -translate-x-1/2 -translate-y-1/4" width="404" height="784" fill="none" viewBox="0 0 404 784">
            <defs>
                <pattern id="b1e6e422-73f8-40a6-b5d9-c8586e37e0e7" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                </pattern>
            </defs>
            <rect width="404" height="784" fill="url(#b1e6e422-73f8-40a6-b5d9-c8586e37e0e7)" />
        </svg>

        <div class="relative mt-12 lg:mt-24 lg:grid lg:grid-cols-2 lg:gap-12 lg:items-center">
            <div class="relative">
                <x-h4>
                    Featured components
                </x-h4>

                <x-p>
                    Whether it's a countdown timer or a map with markers. A wysiwyg editor or rendering Markdown. We offer components for a wide range of use cases.
                </x-p>

                <ul class="mt-10">
                    <li>
                        <div class="flex">
                            <div class="shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-scarlet-500 text-white">
                                    <a href="{{ route('docs', 'countdown') }}">
                                        <x-heroicon-o-clock class="h-6 w-6" />
                                    </a>
                                </div>
                            </div>
                            <div class="ml-4">
                                <x-h5>
                                    Countdown Timer
                                </x-h5>
                                <x-p-sm>
                                    Add a countdown timer for your specified DateTime instance. Modify the look and feel using Blade's power slotted components feature.
                                </x-p-sm>
                            </div>
                        </div>
                    </li>
                    <li class="mt-10">
                        <div class="flex">
                            <div class="shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-scarlet-500 text-white">
                                    <a href="{{ route('docs', 'easy-mde') }}">
                                        <x-heroicon-o-pencil-square class="h-6 w-6" />
                                    </a>
                                </div>
                            </div>
                            <div class="ml-4">
                                <x-h5>
                                    Wysiwyg
                                </x-h5>
                                <x-p-sm>
                                    Want a rich text editor or a Markdown editor? We've got you covered. Blade UI Kit ships with components for the Trix and EasyMDE editors.
                                </x-p-sm>
                            </div>
                        </div>
                    </li>
                    <li class="mt-10">
                        <div class="flex">
                            <div class="shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-scarlet-500 text-white">
                                    <a href="{{ route('docs', 'mapbox') }}">
                                        <x-heroicon-o-map-pin class="h-6 w-6" />
                                    </a>
                                </div>
                            </div>
                            <div class="ml-4">
                                <x-h5>
                                    Mapbox
                                </x-h5>
                                <x-p-sm>
                                    Blade UI Kit comes with a map component out of the box (see what we did there?). Easily integrate a map into your app and add some markers to it.
                                </x-p-sm>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="mt-6 sm:mt-12 text-center">
                    <x-buttons.secondary :href="route('docs')">
                        And many more
                        <x-heroicon-s-arrow-right class="ml-2 h-4 w-4" />
                    </x-buttons.secondary>
                </div>
            </div>

            <div class="mt-10 -mx-4 relative lg:mt-0 px-4">
                <x-snippet name="features" />
            </div>
        </div>

        <svg class="hidden lg:block absolute right-full transform translate-x-1/2 translate-y-12" width="404" height="784" fill="none" viewBox="0 0 404 784">
            <defs>
                <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                </pattern>
            </defs>
            <rect width="404" height="784" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)" />
        </svg>

        <div class="relative mt-12 sm:mt-16 lg:mt-24">
            <div class="lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-12 lg:items-center">
                <div class="lg:col-start-2">
                    <x-h4>
                        You're in full control
                    </x-h4>

                    <x-p>
                        Blade UI Kit aims at providing the best possible developer experience. We want you to be in control. Publish, extend and modify all components at will.
                    </x-p>

                    <ul class="mt-10">
                        <li>
                            <div class="flex">
                                <div class="shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-scarlet-500 text-white">
                                        <x-heroicon-o-code-bracket class="h-6 w-6" />
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <x-h5>
                                        Plug-and-play
                                    </x-h5>
                                    <x-p-sm>
                                        Install the package and immediately start using the components. Most components come ready out-of-the box, saving you time figuring out how to install them.
                                    </x-p-sm>
                                </div>
                            </div>
                        </li>
                        <li class="mt-10">
                            <div class="flex">
                                <div class="shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-scarlet-500 text-white">
                                        <x-heroicon-o-share class="h-6 w-6" />
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <x-h5>
                                        Extend or publish
                                    </x-h5>
                                    <x-p-sm>
                                        Component classes can be easily extended and all of the component views can be published, allowing you to go pretty far in terms of customizing them.
                                    </x-p-sm>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="mt-10 -mx-4 relative lg:mt-0 px-4 lg:col-start-1">
                    <x-snippet name="extend" />
                </div>
            </div>
        </div>
    </div>
</div>
