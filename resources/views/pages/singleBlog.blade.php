@extends('layouts.main')

@section('content')
    @include('pages.singleBlog.breadcrum')
    <section id="content">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <aside class="left-sidebar">
                        @include('partial_pages.categories')
                        @include('partial_pages.latestPost')
                        @include('partial_pages.tags')


                    </aside>
                </div>
                <div class="col-lg-8">
                    @include('pages.singleBlog.content')
{{--                    @include('pages.singleBlog.comments')--}}
                </div>

            </div>

        </div>

    </section>
@endsection