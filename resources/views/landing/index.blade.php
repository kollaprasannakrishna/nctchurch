@extends('layouts.main')

@section('carousel')
    @include('partials._carousel')

@endsection

@section('content')

    <section id="content">
        @include('landing.index.intro')
        @include('landing.index.intro2')
        @include('landing.index.about')
        @include('landing.index.parallaz')
    </section>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
@endsection