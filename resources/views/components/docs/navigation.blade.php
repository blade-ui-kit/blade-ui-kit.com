@props([
    'sections' => [],
    'current' => '',
    'version' => 'main',
])

<nav>
    @foreach ($sections as $section)
        <div {!! $loop->first ? '' : 'class="mt-8"' !!} >
            @isset($section['title'])
                <x-h6>
                    {{ $section['title'] }}
                </x-h6>
            @endisset

            @foreach ($section['pages'] as $page)
                @php($slug = $page['file'] ?? $page)

                <a
                    href="{{ $page['link'] ?? route('docs', [$version, $slug]) }}"
                    @isset($page['link']) target="_blank" @endisset
                    class="mt-1 group flex items-center px-3 py-2 text-sm leading-5 font-medium rounded-md focus:outline-none transition ease-in-out duration-150 {{ $current === $slug ? 'text-gray-900 bg-gray-100 hover:bg-gray-100 focus:bg-gray-200' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 focus:bg-gray-100' }}"
                    aria-current="page"
                >
                    @isset($page['icon'])
                        @svg($page['icon'], 'shrink-0 -ml-1 mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150')
                    @endisset

                    <span class="truncate">
                        {{ $page['name'] ?? str_replace('-', ' ', Illuminate\Support\Str::title($slug)) }}
                    </span>
                </a>
            @endforeach
        </div>
    @endforeach
</nav>
