@extends('layouts.app')

@section('title','| '.$post->title)

@section('content')
    <div class="row remove-margin-bottom add-top-40">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom">

                        <h4>{{$post->title}}</h4>
                        <hr>
                        {!! $post->body !!}

                    </div>

                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom">

                        <h5>Catergory:</h5>
                        <p>{{$post->category->name}}</p>
                        <a href="{{route('blog.single',$post->slug)}}" target="_blank"> Get to single post</a>
                    </div>
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom">

                        @foreach($post->tags as $tag)
                            <div class="chip">

                                {{$tag->name}}
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>











@stop