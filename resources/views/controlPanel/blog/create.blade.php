@extends('layouts.app')
@section('header','Create Post')
@section('title','| Create Post')


@section('styles')
    {!! Html::style('assets/css/select2.min.css') !!}



@endsection

@section('content')





    <div class="row remove-margin-bottom add-top-40">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom">


                        <div class="row">
                            {!! Form::open(array('route'=>'posts.store','class'=>'upload col s12','files'=>true)) !!}
                                <div class="row">



                                    <div class="input-field col s12 m6 l6">
                                        {{Form::text('title',null,array('class'=>'validate'))}}
                                        {{Form::label('title','Title:')}}

                                    </div>
                                    <div class="input-field col s12 m6 l6">

                                        {{Form::text('slug',null,array('class'=>'validate'))}}
                                        {{ Form::label('slug','Slug') }}

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12 m6 l6">

                                        <select name="category_id">
                                            <option value="" disabled selected>Choose your option</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name }}</option>
                                            @endforeach
                                        </select>
                                        {{Form::label('category_id','Category')}}

                                    </div>
                                    <div class="input-field col s12 m6 l6 tags">

                                        <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                        {{Form::label('tags','Tags')}}

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Upload Featured Image</span>
                                            {{Form::file('featured_image')}}
                                        </div>
                                        <div class="file-path-wrapper">
                                            {{Form::text('featured_image',null,['class'=>'file-path validate'])}}
                                            {{--<input class="file-path validate" type="text">--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="row">
                                        <div class="input-field col s12 m12 l12">
                                            {{Form::label('body','Post Body:')}}
                                            {{Form::textarea('body',null,array('class'=>'materialize-textarea'))}}

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
                        <li class="waves-effect waves-light"> <a>{{Form::submit('Save',array('style'=>'margin-top:10px','name'=>'save'))}}</a></li>
                        <li class="waves-effect waves-light"><a>{{Form::submit('Publish',array('style'=>'margin-top:10px','name'=>'save'))}}</a></li>
                        <li class="waves-effect waves-light"><a href="#!">Cancle</a></li>
                        {{--<li class="waves-effect waves-light"><a href="#!"><i class="material-icons">attach_file</i></a></li>--}}
                    </ul>
                </div>
            </div>

        </div>

    </div>
    {!! Form::close() !!}









    {{--<div class="col-md-6">--}}
    {{--{!! Form::open(array('route'=>'file.upload','files'=>true)) !!}--}}
    {{--{{Form::label('featured_image1','Upload Featured Image')}}--}}
    {{--{!!Form::file('featured_image1',['class'=>'form-control']) !!}--}}

    {{--{{Form::submit('Upload',array('class'=>'btn btn-success','style'=>'margin-top:20px'))}}--}}
    {{--{!! Form::close() !!}--}}
    {{--</div>--}}


    {{--<div class="col-md-6">--}}
    {{--<img src="http://www.littleflock.org/laravel_code/public/images/1487444012.png" class="img-responsive">--}}
    {{--{{HTML::image('images/1487443259.png')}}--}}

    {{--<audio controls>--}}
    {{--<source src="" type="audio/ogg">--}}
    {{--<source src="http://www.littleflock.org/laravel_code/public/images/hello/new_audio.mp3" type="audio/mpeg">--}}
    {{--Your browser does not support the audio tag.--}}
    {{--</audio>--}}
    {{--</div>--}}
    {{--</div>--}}




@endsection

@section('scripts')
    {!! Html::script('assets/js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();


    </script>





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