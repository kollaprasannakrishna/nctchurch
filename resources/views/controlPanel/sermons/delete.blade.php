@extends('layouts.app')

@section('title','| Delete Sermon')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Delete Sermon</h1>
            </div>
            <div class="col-md-6">
                {!! Form::open(['route'=>['sermons.destroy',$sermon->id],'method'=>'DELETE']) !!}
                {{Form::submit('Delete',['class'=>'btn btn-danger','style'=>'margin-top:20px;float:right;'])}}
                {!! Form::close() !!}
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h1>{{$sermon->title}}</h1>
            </div>
        </div>
    </div>
@endsection