@php
    $markdown = preg_replace('(```[a-z]*\n[\s\S]*?\n```)', '', $slot);
    $items = collect(preg_split('/\r\n|\r|\n/', $markdown))
        ->filter(fn ($line) => str_starts_with($line, '## ') || str_starts_with($line, '### '))
        ->map(fn ($line) => [
            'level' => str_starts_with($line, '### ') ? 3 : 2,
            'title' => trim(\Illuminate\Support\Str::after($line, '# ')),
        ]);
    $previousLevel = 2;
@endphp

<ul {{ $attributes }}>
    <li>
        @foreach ($items as $item)
            @if (! $loop->first)
                @if ($item['level'] > $previousLevel)
                    <ul>
                        <li>
                @endif

                @if ($item['level'] < $previousLevel)
                        </li>
                    </ul>
                @endif

                @if ($item['level'] <= $previousLevel)
                    </li>
                    <li>
                @endif
            @endif

            <a href="#{{ \Illuminate\Support\Str::slug($item['title']) }}">
                {{ $item['title'] }}
            </a>

            @if ($loop->last && $item['level'] === 3)
                    </li>
                </ul>
            @endif

            @php($previousLevel = $item['level'])
        @endforeach
    </li>
</ul>
