@extends('layouts.app')
@section('header','Create Sermons')
@section('title','| Create Sermons')

@section('styles')


@endsection

@section('content')
    <div class="row remove-margin-bottom add-top-40">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom">


                        <div class="row">

                            {!! Form::open(array('route'=>'sermons.store','files'=>true,'class'=>'col s12')) !!}

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

                                        <select name="venue_id">
                                            <option value="" disabled selected>Choose your option</option>
                                            @foreach($venues as $venue)
                                                <option value="{{$venue->id}}">{{$venue->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Venue</label>

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
                                    <div class="input-field col s12 m4 l4">

                                        <select name="series_id">
                                            <option value="" disabled selected>Choose your option</option>
                                            @foreach($seriess as $series)
                                                <option value="{{$series->id}}">{{$series->name }}</option>
                                            @endforeach

                                        </select>
                                        <label>Series</label>
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
            menubar:false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_css: '//www.tinymce.com/css/codepen.min.css'
        });
    </script>


@endsection