@props(['title' => null])

@php($pageTitle = isset($title) ? $title.' - '.config('app.name') : config('app.name'))

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $pageTitle }}</title>

        <meta name="twitter:card" content="summary_large_image">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $pageTitle }}">
        <meta name="description" content="A set of renderless components to utilise in your Laravel Blade views. Built for the TALL stack. Completely open-source.">
        <meta property="og:description" content="A set of renderless components to utilise in your Laravel Blade views. Built for the TALL stack. Completely open-source.">
        <meta property="og:image" content="{{ asset('/images/socialcard.png') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:locale" content="{{ app()->getLocale() }}">

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
        <meta name="msapplication-TileColor" content="#b91d47">
        <meta name="theme-color" content="#ffffff">

        @vite('resources/js/app.js')

        @vite('resources/css/app.css')

        {{ $head ?? '' }}

        @livewireStyles

        @production
            <!-- Fathom - beautiful, simple website analytics -->
            <script src="https://cdn.usefathom.com/script.js" site="SVSHYYIX" defer></script>
            <!-- / Fathom -->
        @endproduction
    </head>

    <body {{ $attributes->class('font-sans border-t-8 border-scarlet-500') }}>
        {{ $slot }}

        @livewireScripts
    </body>
</html>
