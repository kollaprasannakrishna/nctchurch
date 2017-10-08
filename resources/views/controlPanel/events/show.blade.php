@extends('layouts.app')

@section('title','| Create Categories')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$event->title}}</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Data</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Day</th>
                            <th>Type</th>
                            <th>Author</th>

                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$event->id}}</td>
                                <td>{{$event->name}}</td>
                                <td>{{$event->description}}</td>
                                <td>{{$event->date}}</td>
                                <td>{{$event->time}}</td>
                                <td>{{$event->venue->name}}</td>
                                <td>{{$event->day}}</td>
                                <td>{{$event->type}}</td>
                                <td>{{$event->user->name}}</td>
                                <td><a href="#" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a href="#" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop