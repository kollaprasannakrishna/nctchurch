@extends('layouts.app')

@section('title','| Edit Roles')
@section('styles')
    {!! Html::style('assets/css/select2.min.css') !!}
    <style>
        .select2-container--default{
            width: 250px !important;
        }
    </style>
@endsection
@section('content')
    <div class="row add-top-40">
        <div class="col s12 l4 offset-l4">
            <div class="card-panel">
                <div class="row">
                    {!! Form::model($user,['route'=>['admin.update',$user->id],'class'=>'col s12','method'=>'PUT']) !!}

                        <div class="row">
                            <div class="input-field col s12">
                                {{Form::label('name','Name')}}
                                {{Form::text('name',null,['class'=>'validate','disabled'=>'disabled'])}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                {{Form::label('email','Email')}}
                                {{Form::text('email',null,['class'=>'validate','disabled'=>'disabled'])}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                {{Form::label('roles','Roles')}}

                                {{Form::select('roles[]',$roles,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}



                            </div>
                        </div>
                    <div class="row">
                        <div class="switch">
                            <label>
                                Inactive
                                @if($user->active)
                                {{Form::checkbox('active', 'true',true)}}
                                @else
                                    {{Form::checkbox('active', 'true',false)}}
                                @endif

                                    <span class="lever"></span>
                                Active
                            </label>
                        </div>

                    </div>
                        <div class="row">
                            <div class="col s12 center">
                                {{Form::submit('update Roles',['class'=>'waves-effect waves-light btn center'])}}

                            </div>
                        </div>


                    {!! Form::close() !!}
                </div>

            </div>
        </div>

    </div>




@stop

@section('scripts')
    {!! Html::script('assets/js/select2.min.js') !!}
    <script type="text/javascript">
//        $('.select2-multi').select2();
{{--        $('.select2-multi').select2().val({!! json_encode($user->roles()->getRelatedIds()) !!}).trigger('change');--}}



    </script>
@endsection