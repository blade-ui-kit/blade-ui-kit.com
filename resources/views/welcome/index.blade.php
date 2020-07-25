@extends('layouts.base')

@section('body')
    <x-navigation>
        @include('welcome.hero')
    </x-navigation>

    @include('welcome.stats')

    @include('welcome.features')

    @include('welcome.tall')

    @include('welcome.testimonials')

    @include('welcome.blade-icons')

    @include('welcome.quote')
@endsection
