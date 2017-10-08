@extends('layouts.app')
@section('header','Create Members')
@section('title','| Create Members')
@section('styles')
    {!! Html::style('assets/css/select2.min.css') !!}
@endsection
@section('content')
    {!! Form::open(['route'=>'members.import','files'=>true,'id'=>'eventForm']) !!}
    <div class="row remove-margin-bottom add-top-40">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null">

                        <div class="row">

                            <div class="col s12 m12 l10">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Batch Member Upload</span>
                                        {{Form::file('member_excel')}}
                                    </div>
                                    <div class="file-path-wrapper">
                                        {{Form::text('member_excel',null,['class'=>'file-path validate'])}}

                                    </div>
                                </div>

                            </div>
                            <div class="col s12 m2 l2 add-top-20 add-bottom-20 center">
                                {{Form::submit('Import',array('class'=>'waves-effect waves-light btn'))}}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
    {!! Form::close() !!}

    {!! Form::open(['route'=>'members.store','class'=>'upload col s12','method'=>'POST']) !!}
    <div class="row remove-margin-bottom add-top-40">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">

                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom">


                        <div class="row">

                            <div class="row">
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('firstname','First Name')}}
                                    {{Form::text('firstname',null,['class'=>'validate'])}}
                                </div>
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('lastname','Last Name')}}
                                    {{Form::text('lastname',null,['class'=>'validate'])}}
                                </div>
                                <div class="input-field col s12 m4 l4">

                                    {{Form::select('positions[]',$positions,null,['class'=>'select2-multi','multiple'=>'multiple'])}}
                                    {{Form::label('positions','positions')}}
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
                            <div class="row">

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
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
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
                        <li class="waves-effect waves-light"><a href="#!"> {{Form::submit('Save',array('name'=>'save'))}}</a></li>
                        <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">publish</i></a></li>
                        {{--<li class="waves-effect waves-light"><a href="#!"><i class="material-icons">attach_file</i></a></li>--}}
                    </ul>
                </div>
            </div>

        </div>

    </div>


    {!! Form::close() !!}


@endsection

@section('scripts')
    {!! Html::script('assets/js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

@endsection