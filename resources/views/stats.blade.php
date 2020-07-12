<div class="bg-white pt-12 sm:pt-16">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl leading-9 font-extrabold text-gray-900 sm:text-4xl sm:leading-10">
                A growing ecosystem
            </h2>
            <p class="mt-3 text-xl leading-7 text-gray-500 sm:mt-4">
                More components are joining Blade UI Kit regularly.
            </p>
        </div>
    </div>
    <div class="mt-10 pb-12 bg-gray-50 sm:pb-16">
        <div class="relative">
            <div class="absolute inset-0 h-1/2 bg-white"></div>
            <div class="relative max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto">
                    <dl class="rounded-lg bg-white border-t border-gray-100 shadow-lg sm:grid sm:grid-cols-3">
                        <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500" id="item-1">
                                Components
                            </dt>
                            <dd class="order-1 text-5xl leading-none font-extrabold text-scarlet-600" aria-describedby="item-1">
                                {{ count(config('blade-ui-kit.components')) }}
                            </dd>
                        </div>
                        <div class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                Downloads
                            </dt>
                            <dd class="order-1 text-5xl leading-none font-extrabold text-scarlet-600">
                                50k
                            </dd>
                        </div>
                        <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                Contributors
                            </dt>
                            <dd class="order-1 text-5xl leading-none font-extrabold text-scarlet-600">
                                10
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <x-buttons.primary href="https://github.com/blade-ui-kit/blade-ui-kit">
                <x-heroicon-s-plus-circle class="-ml-0.5 mr-2 h-4 w-4" />
                Contribute your own
            </x-buttons.primary>
        </div>
    </div>
</div>
