@extends('layouts.app')

@section('title','| Delete Post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Delete Series</h1>
            </div>
            <div class="col-md-6">
                {!! Form::open(['route'=>['series.destroy',$series->id],'method'=>'DELETE']) !!}
                {{Form::submit('Delete',['class'=>'btn btn-danger','style'=>'margin-top:20px;float:right;'])}}
                {!! Form::close() !!}
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h1>{{$series->name}}</h1>
                <p>The sermons associated with this series</p>
                <ol>
                    @foreach($series->sermons as $sermon)
                        <li>{{$sermon->title}}</li>
                    @endforeach
                </ol>
                <p>All these will be moved under mislaneous.</p>

            </div>
        </div>
    </div>
@endsection