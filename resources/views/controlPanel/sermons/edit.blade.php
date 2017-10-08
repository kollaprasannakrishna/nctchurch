@extends('layouts.app')
@section('header','Edit Sermon')
@section('title','| Edit Sermon')



@section('content')
    <div class="row remove-margin-bottom add-top-40">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom">


                        <div class="row">

                            {!! Form::model($sermon,['route'=>['sermons.update',$sermon->id],'files'=>true,'id'=>'eventForm','method'=>'PUT']) !!}

                            <div class="row">
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('title','Sermon Title:')}}
                                    {{Form::text('title',null,array('class'=>'validate'))}}
                                </div>
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('speaker','Speaker:')}}
                                    {{Form::text('speaker',null,array('class'=>'validate'))}}
                                </div>
                                <div class="input-field col s12 m4 l4">

                                    <label>Venue</label>
                                    {{Form::select('venue_id',$venues,null)}}

                                </div>
                            </div>


                            <div class="row">
                                <div class="input-field col s12 m4 l4">

                                    {{ Form::label('date','Date:') }}
                                    {{Form::date('date',null,['class'=>'datepicker'])}}
                                </div>
                                <div class="input-field col s12 m4 l4">
                                    {{Form::label('videolink','YouTube Link:')}}
                                    {{Form::text('videolink',null,array('class'=>'form-control'))}}

                                </div>




                            </div>


                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Mp3</span>
                                            {{Form::file('audio_file')}}
                                        </div>
                                        <div class="file-path-wrapper">
                                            {{Form::text('audio_file',null,['class'=>'file-path validate'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Image</span>
                                            {{Form::file('featured_image')}}
                                        </div>
                                        <div class="file-path-wrapper">
                                            {{Form::text('featured_image',null,['class'=>'file-path validate'])}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="input-field col s12 m12 l12">
                                        {{Form::label('description','Sermon Description:')}}
                                        {{Form::textarea('description',null,array('class'=>'materialize-textarea'))}}

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
                        <li class="waves-effect waves-light"> {{Form::submit('Save',array('class'=>'btn','style'=>'margin-top:10px','name'=>'save'))}}</li>
                        <li class="waves-effect waves-light">{{Form::submit('Publish',array('class'=>'btn','style'=>'margin-top:10px','name'=>'save'))}}</li>
                        <li class="waves-effect waves-light"><a href="#!">Cancle</a></li>
                    </ul>
                </div>
            </div>

        </div>


    </div>
    {!! Form::close() !!}


@endsection

@section('scripts')

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>

        tinymce.init({
            selector: 'textarea',
            height: 140,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
            image_advtab: true,
            imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });
    </script>

@endsection