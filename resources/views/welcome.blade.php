@extends('layouts.base')

@section('body')
    <div class="relative bg-white overflow-hidden">
        <div class="relative pt-6 pb-16 md:pb-20 lg:pb-24 xl:pb-32">
            @include('layouts.navigation')

            @include('hero')
        </div>
    </div>

    @include('stats')

    @include('features')

    @include('tall')

    @include('testimonials')

    @include('blade-icons')

    @include('quote')
@endsection
