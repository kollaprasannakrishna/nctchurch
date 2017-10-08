@extends('layouts.app')

@section('title','| Create Categories')

@section('content')


    {!! Form::open(['route'=>'venue.store','method'=>'POST']) !!}
    <div class="row remove-margin-bottom add-top-40">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">

                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom">


                        <div class="row">

                            <div class="row">
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('name','Church Name')}}
                                    {{Form::text('name',null,['class'=>'validate'])}}
                                </div>
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('email','Email')}}
                                    {{Form::text('email',null,['class'=>'validate'])}}
                                </div>
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('phone','Contact No')}}
                                    {{Form::text('phone',null,['class'=>'validate'])}}
                                </div>

                            </div>


                            <div class="row">
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('address1','Address 1')}}
                                    {{Form::text('address1',null,['class'=>'validate'])}}
                                </div>
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('address2','Address 2')}}
                                    {{Form::text('address2',null,['class'=>'validate'])}}
                                </div>
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('city','City')}}
                                    {{Form::text('city',null,['class'=>'validate'])}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('state','State')}}
                                    {{Form::text('state',null,['class'=>'validate'])}}
                                </div>
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('zip','Zip Code')}}
                                    {{Form::text('zip',null,['class'=>'validate'])}}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row adjust-fab-toolbar">
        <div class="col s12 m12 l12">
            <div class="col s12 m12 l12">
                <div class="fixed-action-btn toolbar">
                    <a class="btn-floating btn-large red">
                        <i class="large material-icons">mode_edit</i>
                    </a>
                    <ul>
                        <li class="waves-effect waves-light"><a href="#!"> {{Form::submit('Save',array('class'=>'btn','name'=>'save'))}}</a></li>
                        {{--<li class="waves-effect waves-light"><a href="#!">{{Form::submit('Publish',array('class'=>'btn','name'=>'save'))}}</a></li>--}}
                        <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">publish</i></a></li>
                        {{--<li class="waves-effect waves-light"><a href="#!"><i class="material-icons">attach_file</i></a></li>--}}
                    </ul>
                </div>
            </div>

        </div>

    </div>


    {!! Form::close() !!}


    <div class="row remove-margin-bottom add-top-40">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null">
                        <nav class="grad-back">
                            <div class="nav-wrapper">
                                <form>
                                    <div class="input-field">
                                        <input id="search" type="search" required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>

                        <table id="table" class="highlight responsive-table bordered striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Church name</th>
                                <th>Address 1</th>
                                <th>Address 2</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zip</th>
                                <th>Contact</th>
                                <th></th>
                                <!-- <th data-field="price"></th>
                                <th data-field="price"></th> -->
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($venues as $venue)
                                <tr>
                                    <td>{{$venue->id}}</td>
                                    <td>{{$venue->name}}</td>
                                    <td>{{$venue->address1}}</td>
                                    <td>{{$venue->address2}}</td>
                                    <td>{{$venue->city}}</td>
                                    <td>{{$venue->state}}</td>
                                    <td>{{$venue->zip}}</td>
                                    <td>{{$venue->contact}}</td>
                                    <td>
                                        <div class="fixed-action-btn horizontal edit-button">
                                            <a class="btn-floating btn-small red">
                                                <i class="large material-icons">mode_edit</i>
                                            </a>
                                            <ul>
                                                <li><a class="btn-floating red" href="{{route('venue.edit',$venue->id)}}"><i class="material-icons">mode_edit</i></a></li>
                                                <li><a class="btn-floating green">{!! Form::open(['route'=>['venue.destroy',$venue->id],'method'=>'DELETE']) !!}
                                                        {{Form::submit('Delete',['class'=>'btn btn-danger btn-xs'])}}
                                                        {!! Form::close() !!}</a></li>
                                                {{--<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>--}}
                                            </ul>
                                        </div>
                                        <div class="hide-on-large-only">
                                            <div class="col s12 m12">
                                                <a href="{{route('venue.edit',$venue->id)}}" class="btn btn-primary btn-xs">Edit</a>
                                            </div><br>
                                            <div class="col s12 m12 add-top-10 add-bottom-10">
                                                <a>{!! Form::open(['route'=>['venue.destroy',$venue->id],'method'=>'DELETE']) !!}
                                                    {{Form::submit('Delete',['class'=>'btn btn-danger btn-xs'])}}
                                                    {!! Form::close() !!}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td><i class="material-icons small">mode_edit</i></td>
                                    <td><i class="material-icons small">delete</i></td> -->
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                        <div class="col s12 m12 l12 center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
















@stop