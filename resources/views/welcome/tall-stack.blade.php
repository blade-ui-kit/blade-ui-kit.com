<div class="bg-white sm:py-12">
    <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="relative text-center">
            <x-h3>
                Built for the TALL stack
            </x-h3>
            <x-p>
                Blade UI Kit was designed to work smoothly with these technologies.
            </x-p>
        </div>

        <div class="mt-10 grid grid-cols-2 gap-8 md:grid-cols-4">
            <div class="flex justify-center">
                <a href="https://tailwindcss.com">
                    <img class="h-12 enlarge" src="{{ asset('/images/tailwindcss.svg') }}" alt="Tailwind CSS" />
                </a>
            </div>
            <div class="flex justify-center">
                <a href="https://github.com/alpinejs/alpine" class="text-base sm:text-2xl lg:text-3xl font-semibold enlarge">
                    <img class="h-12 inline mr-2" src="{{ asset('/images/alpine.svg') }}" alt="Alpine.js" />
                    Alpine.js
                </a>
            </div>
            <div class="flex justify-center">
                <a href="https://laravel-livewire.com">
                    <img class="h-12 enlarge" src="{{ asset('/images/livewire.svg') }}" alt="Livewire" />
                </a>
            </div>
            <div class="flex justify-center">
                <a href="https://laravel.com">
                    <img class="h-12 enlarge" src="{{ asset('/images/laravel.svg') }}" alt="Laravel" />
                </a>
            </div>
        </div>

        <div class="mt-6 sm:mt-16 sm:flex sm:justify-center">
            <x-buttons.primary href="https://tallstack.dev">
                <x-heroicon-s-book-open class="-ml-1 mr-3 h-5 w-5" />
                The TALL stack
            </x-buttons.primary>

            <div class="mt-3 sm:mt-0 sm:ml-3">
                <x-buttons.secondary href="https://github.com/blade-ui-kit/awesome-tall-stack">
                    <x-heroicon-s-star class="-ml-1 mr-3 h-5 w-5" />
                    Awesome TALL Stack
                </x-buttons.secondary>
            </div>
        </div>
    </div>
</div>
