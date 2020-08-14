<div class="relative overflow-hidden bg-white">
    <div class="relative pt-6 sm:pb-10" x-data="{ open: false }">
        <nav class="relative flex items-center justify-between max-w-screen-xl px-4 mx-auto sm:px-6">
            <div class="flex items-center flex-1">
                <div class="flex items-center justify-between w-full md:w-auto">
                    <a href="{{ route('home') }}" aria-label="Home">
                        <img class="w-auto h-8 sm:h-10" src="{{ asset('/images/icon.svg') }}" alt="Logo" />
                    </a>
                    <div class="flex items-center -mr-2 md:hidden">
                        <button @click="open = true" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500" id="main-menu" aria-label="Main menu" aria-haspopup="true">
                            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="hidden md:block md:ml-10">
                    <a href="{{ route('docs') }}" class="font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">
                        Documentation
                    </a>
                    <a href="{{ route('home') }}#features" class="ml-10 font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">
                        Features
                    </a>
                    <a href="{{ route('blade-icons') }}" class="ml-10 font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">
                        Blade Icons
                    </a>
                </div>
            </div>
            <div class="hidden text-right md:block text-gray">
                <x-a
                    href="https://github.com/blade-ui-kit/blade-ui-kit"
                    class="ml-4 font-medium transition duration-150 ease-in-out"
                >
                    <x-icon-github class="inline w-6 h-6"/>
                </x-a>
                <x-a
                    href="https://discord.gg/Vev5CyE"
                    class="ml-4 font-medium transition duration-150 ease-in-out"
                >
                    <x-icon-discord class="inline w-6 h-6"/>
                </x-a>
            </div>
        </nav>

        <div class="fixed inset-x-0 top-0 z-10 p-2 transition origin-top-right transform md:hidden top-2" x-show="open" @click.away="open = false">
            <div class="rounded-lg shadow-md">
                <div class="overflow-hidden bg-white rounded-lg shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="main-menu">
                    <div class="flex items-center justify-between px-5 pt-4">
                        <div>
                            <a href="{{ route('home') }}">
                                <img class="w-auto h-8" src="{{ asset('/images/icon.svg') }}" alt="" />
                            </a>
                        </div>
                        <div class="-mr-2">
                            <button @click="open = false" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500" aria-label="Close menu">
                                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="px-2 pt-2 pb-3">
                        <a href="{{ route('docs') }}" class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50" role="menuitem">
                            Documentation
                        </a>
                        <a href="{{ route('home') }}#features" class="block px-3 py-2 mt-1 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50" role="menuitem">
                            Features
                        </a>
                        <a href="{{ route('home') }}#blade-icons" class="block px-3 py-2 mt-1 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50" role="menuitem">
                            Blade Icons
                        </a>
                    </div>
                    <div class="text-center bg-gray-50">
                        <x-a
                            href="https://github.com/blade-ui-kit/blade-ui-kit"
                            class="inline-block px-5 py-3 font-medium text-center transition duration-150 ease-in-out bg-gray-50 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                        >
                            <x-icon-github class="inline w-6 h-6"/>
                        </x-a>
                        <x-a
                            href="https://discord.gg/Vev5CyE"
                            class="inline-block px-5 py-3 font-medium text-center transition duration-150 ease-in-out bg-gray-50 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                        >
                            <x-icon-discord class="inline w-6 h-6"/>
                        </x-a>
                    </div>
                </div>
            </div>
        </div>

        {{ $slot }}
    </div>
</div>
