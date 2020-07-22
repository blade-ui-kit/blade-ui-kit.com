@extends('layouts.base')

@section('body')
    <div class="relative bg-white overflow-hidden">
        <div class="relative pt-6 pb-16 md:pb-20 lg:pb-24 xl:pb-32">
            @include('layouts.navigation')

            @include('welcome.hero')
        </div>
    </div>

    @include('welcome.stats')

    @include('welcome.features')

    @include('welcome.tall')

    @include('welcome.testimonials')

    @include('welcome.blade-icons')

    @include('welcome.quote')
@endsection
