@extends('layouts.app')

@section('title','| Create Categories')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$category->name}}</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>{{$category->posts->count()}} are Associated Posts</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category->posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->body}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->category->name}}</td>
                                <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a href="{{route('posts.show',$post->id )}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                <td>
                                    <a href="{{route('posts.delete',$post->id)}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                {!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
                {{Form::label('name','Category Name')}}
                {{Form::text('name',null,['class'=>'form-control'])}}
                {{Form::submit('Create new',['class'=>'btn btn-success btn-block','style'=>'margin-top:20px;'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop