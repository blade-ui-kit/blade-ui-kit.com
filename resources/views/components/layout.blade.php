<x-html class="font-sans border-t-8 border-scarlet-500" :title="isset($title) ? $title . ' - ' . config('app.name') : ''">
    <x-slot name="head">
        <x-social-meta
            :title="$component->title()"
            description="A set of renderless components to utilise in your Laravel Blade views. Built for the TALL stack. Completely open-source."
            :image="asset('/images/socialcard.png')"
        />

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
        <meta name="msapplication-TileColor" content="#b91d47">
        <meta name="theme-color" content="#ffffff">

        @vite('resources/js/app.js')

        @vite('resources/css/app.css')

        {{ $head ?? '' }}

        @bukStyles

        @production
            <!-- Fathom - beautiful, simple website analytics -->
            <script src="https://cdn.usefathom.com/script.js" site="SVSHYYIX" defer></script>
            <!-- / Fathom -->
        @endproduction
    </x-slot>

    {{ $slot }}

    @bukScripts
</x-html>
