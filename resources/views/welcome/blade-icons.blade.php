<div id="blade-icons" class="relative bg-gray-50 overflow-hidden">
    <div class="max-w-screen-xl mx-auto">
        <div class="relative z-10 pb-8 bg-gray-50 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-36">
            <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-32 text-gray-50 transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon points="50,0 100,0 50,100 0,100" />
            </svg>

            <main class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 pt-8 lg:pt-28 xl:pt-32">
                <div class="sm:text-center lg:text-left lg:pr-8">
                    <x-h2>
                        Blade Icons
                    </x-h2>

                    <x-p>
                        A package to easily make use of SVG icons in your <strong>Laravel Blade</strong> views. Choose from a wide selection of icon sets. <span class="hidden lg:inline">Like the <x-a href="https://github.com/blade-ui-kit/blade-heroicons">Heroicons</x-a> on the right.</span>
                    </x-p>

                    <x-p>
                        <x-heroicon-s-heart class="inline-block pb-1 h-6 w-6 text-red-600" /> Makes using SVG icons as simple as...
                    </x-p>

                    <x-snippet name="blade-icons" />

                    <div class="mt-6 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <x-buttons.primary href="https://github.com/blade-ui-kit/blade-icons">
                            <x-heroicon-s-book-open class="-ml-1 mr-3 h-5 w-5" />
                            Get started
                        </x-buttons.primary>

                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <x-buttons.secondary :href="route('blade-icons').'#search'">
                                <x-heroicon-s-magnifying-glass class="-ml-1 mr-3 h-5 w-5" />
                                Search Icons
                            </x-buttons.secondary>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-scarlet-300 h-full w-full">
        <div class="h-full" style="background: url('/images/heroicons-pattern.svg') 0 13px repeat"></div>
    </div>
</div>
