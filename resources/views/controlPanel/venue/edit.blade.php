@extends('layouts.app')

@section('title','| Edit Categories')

@section('content')

    {!! Form::model($venue,['route'=>['venue.update',$venue->id],'method'=>'PUT']) !!}
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
                        <li class="waves-effect waves-light"><a href="#!"> {{Form::submit('Update',array('class'=>'btn','name'=>'save'))}}</a></li>
                        {{--<li class="waves-effect waves-light"><a href="#!">{{Form::submit('Publish',array('class'=>'btn','name'=>'save'))}}</a></li>--}}
                        <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">publish</i></a></li>
                        {{--<li class="waves-effect waves-light"><a href="#!"><i class="material-icons">attach_file</i></a></li>--}}
                    </ul>
                </div>
            </div>

        </div>

    </div>


    {!! Form::close() !!}




@stop