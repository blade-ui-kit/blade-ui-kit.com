<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <script src="{{ mix('js/app.js') }}" defer></script>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-sans">
    @yield('body')

    @include('layouts.footer')
</body>
</html>
