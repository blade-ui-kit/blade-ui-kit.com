<div class="bg-white pt-12 sm:pt-24">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <x-h3>
                A component for everyone
            </x-h3>
            <x-p>
                With {{ count(config('blade-ui-kit.components')) }} different components, we probably have something for you.
            </x-p>
        </div>
    </div>
    <div class="mt-10 bg-gray-50">
        <div class="relative">
            <div class="absolute inset-0 h-1/2 bg-white"></div>
            <div class="relative max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl mx-auto">
                    <dl class="rounded-lg bg-white border-t border-gray-100 shadow-lg sm:grid sm:grid-cols-2">
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
                                {{ $downloads }}
                            </dd>
                        </div>
{{--                        <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">--}}
{{--                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">--}}
{{--                                Contributors--}}
{{--                            </dt>--}}
{{--                            <dd class="order-1 text-5xl leading-none font-extrabold text-scarlet-600">--}}
{{--                                10--}}
{{--                            </dd>--}}
{{--                        </div>--}}
                    </dl>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <x-buttons.primary href="/docs/contribution-guide">
                <x-heroicon-s-plus-circle class="-ml-0.5 mr-2 h-4 w-4" />
                Contribute your own
            </x-buttons.primary>
        </div>
    </div>
</div>
