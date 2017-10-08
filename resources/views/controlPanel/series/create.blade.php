@extends('layouts.app')
@section('header','Create Sermon Series')
@section('title','| Create Sermon Series')

@section('content')


    <div class="row remove-margin-bottom add-top-10 row-padding">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null">

                        <div class="row">
                            {!! Form::open(['route'=>'series.store','method'=>'POST']) !!}
                            <div class="col s12 m12 l12">
                                <div class="input-field col s12 m10 l10">
                                    {{Form::label('name','Series Name')}}
                                    {{Form::text('name',null,['class'=>'validate'])}}


                                </div>
                                <div class="col s12 m2 l2 add-top-20">
                                    {{Form::submit('Create',['class'=>'waves-effect waves-light btn'])}}
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>


                    </div>


                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null">

                        <table class="highlight responsive-table bordered striped centered">
                            <thead>
                            <tr>
                                <th data-field="id">ID</th>
                                <th data-field="name">Title</th>

                                <th data-field="price"></th>
                                <!-- <th data-field="price"></th>
                                <th data-field="price"></th> -->
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                            @foreach($seriess as $series)
                                <tr>
                                    <td>{{$series->id}}</td>
                                    <td>{{$series->name}}</td>
                                    <td>
                                        <div class="fixed-action-btn horizontal edit-button hide-on-med-and-down">
                                            <a class="btn-floating btn-small red">
                                                <i class="large material-icons">mode_edit</i>
                                            </a>
                                            <ul>
                                                <li><a class="btn-floating red" href="{{route('series.edit',$series->id)}}"><i class="material-icons">mode_edit</i></a></li>
                                                <li><a class="btn-floating yellow darken-1" href="{{route('series.show',$series->id)}}"><i class="material-icons">visibility</i></a></li>
                                                <li><a class="btn-floating green" href="{{route('series.delete',$series->id)}}"><i class="material-icons">delete</i></a></li>

                                            </ul>
                                        </div>
                                        <div class="hide-on-large-only">
                                            <div class="col s12 m12">
                                                edit
                                            </div><br>
                                            <div class="col s12 m12 add-top-10">
                                                View
                                            </div><br>
                                            <div class="col s12 m12 add-top-10 add-bottom-10">
                                                Delete
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop