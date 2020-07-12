<main class="mt-8 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-20 xl:mt-24">
    <div class="lg:grid lg:grid-cols-12 lg:gap-8">
        <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
            <a href="https://github.com/blade-ui-kit/blade-ui-kit" class="inline-flex items-center px-3 pb-1 pt-1.5 rounded-full uppercase text-sm font-hind font-semibold leading-5 bg-scarlet-100 hover:bg-scarlet-200 text-scarlet-800">
                Pre-release out now
            </a>

            <x-h2 class="mt-3 sm:mt-5">
                Blade UI Kit
            </x-h2>

            <x-p>
                A set of renderless components to utilise in your <strong>Laravel Blade</strong> views. Built for the <strong>TALL</strong> stack.
            </x-p>

            <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
                <x-buttons.primary href="#">
                    <x-heroicon-s-book-open class="-ml-1 mr-3 h-5 w-5" />
                    Get started
                </x-buttons.primary>

                <div class="mt-3 sm:mt-0 sm:ml-3">
                    <x-buttons.secondary href="{{ route('home') }}#features">
                        <x-heroicon-s-collection class="-ml-1 mr-3 h-5 w-5" />
                        Features
                    </x-buttons.secondary>
                </div>
            </div>
        </div>
        <div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
            <svg class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-8 scale-75 origin-top sm:scale-100 lg:hidden" width="640" height="784" fill="none" viewBox="0 0 640 784">
                <defs>
                    <pattern id="4f4f415c-a0e9-44c2-9601-6ded5a34a13e" x="118" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect y="72" width="640" height="640" class="text-gray-50" fill="currentColor" />
                <rect x="118" width="404" height="784" fill="url(#4f4f415c-a0e9-44c2-9601-6ded5a34a13e)" />
            </svg>
            <div class="relative mx-auto w-full rounded-lg shadow-lg lg:max-w-md">
                <button type="button" class="relative block w-full rounded-lg overflow-hidden focus:outline-none focus:shadow-outline">
                    <img class="w-full" src="https://images.unsplash.com/photo-1556740758-90de374c12ad?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Woman making a sale" />
                    <div class="absolute inset-0 w-full h-full flex items-center justify-center">
                        <svg class="h-20 w-20 text-scarlet-500" fill="currentColor" viewBox="0 0 84 84">
                            <circle opacity="0.9" cx="42" cy="42" r="42" fill="white" />
                            <path d="M55.5039 40.3359L37.1094 28.0729C35.7803 27.1869 34 28.1396 34 29.737V54.263C34 55.8604 35.7803 56.8131 37.1094 55.9271L55.5038 43.6641C56.6913 42.8725 56.6913 41.1275 55.5039 40.3359Z" />
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
</main>
