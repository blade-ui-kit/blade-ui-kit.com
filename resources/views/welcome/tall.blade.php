<div class="bg-white sm:py-12">
    <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="relative text-center">
            <x-h3>
                Built for <x-a href="https://tallstack.dev">the TALL stack</x-a>
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
                <a href="https://laravel.com">
                    <img class="h-12 enlarge" src="{{ asset('/images/laravel.svg') }}" alt="Laravel" />
                </a>
            </div>
            <div class="flex justify-center">
                <a href="https://laravel-livewire.com">
                    <img class="h-12 enlarge" src="{{ asset('/images/livewire.svg') }}" alt="Livewire" />
                </a>
            </div>
        </div>
    </div>
</div>
