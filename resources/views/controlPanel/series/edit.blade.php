@extends('layouts.app')
@section('header','Edit '.$series->name.' Series')
@section('title','| Edit Categories')

@section('content')
    <div class="row remove-margin-bottom add-top-10 row-padding">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null">

                        <div class="row">
                            {!! Form::model($series,['route'=>['series.update',$series->id],'method'=>'PUT']) !!}
                            <div class="col s12 m12 l12">
                                <div class="input-field col s12 m10 l10">
                                    {{Form::label('name','Series Name')}}
                                    {{Form::text('name',null,['class'=>'validate'])}}
                                </div>
                                <div class="col s12 m2 l2 add-top-20">
                                    {{Form::submit('Update',['class'=>'waves-effect waves-light btn'])}}
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>



@stop