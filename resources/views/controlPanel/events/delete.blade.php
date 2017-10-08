@extends('layouts.app')

@section('title','| Delete Event')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Delete Event</h1>
            </div>
            <div class="col-md-6">
                {!! Form::open(['route'=>['events.destroy',$event->id],'method'=>'DELETE']) !!}
                {{Form::submit('Delete',['class'=>'btn btn-danger','style'=>'margin-top:20px;float:right;'])}}
                {!! Form::close() !!}
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h1>{{$event->name}}</h1>
                <p>{{$event->description}}</p>
            </div>
        </div>
    </div>
@endsection