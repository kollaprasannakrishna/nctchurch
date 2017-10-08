@extends('layouts.app')

@section('header','Edit Post '.$post->title)
@section('title','| Edit Post')

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
                            {!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT','files'=>true]) !!}
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

                                    {{Form::select('category_id',$categories,null,['class'=>'form-control'])}}
                                    {{Form::label('category_id','Category')}}

                                </div>
                                <div class="input-field col s12 m6 l6 tags">

                                    {{Form::select('tags[]',$tags,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}
                                    {{Form::label('tags','Tags')}}

                                </div>

                            </div>
                            <div class="row">
                                <div class="file-field input-field col s10">
                                    <div class="btn">
                                        <span>Upload Featured Image</span>
                                        {{Form::file('featured_image')}}
                                    </div>
                                    <div class="file-path-wrapper">
                                        {{Form::text('featured_image',null,['class'=>'file-path validate'])}}
                                        {{--<input class="file-path validate" type="text">--}}
                                    </div>
                                </div>
                                <div class="col s2">
                                    <img src="{{asset('images/posts/'.$post->small_image)}}" width="100" height="100"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="input-field col s12 m12 l12">
                                        {{Form::label('body','Post Body:')}}
                                        {{Form::textarea('body',null,array('class'=>'form-control'))}}

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
                        <li class="waves-effect waves-light"> <a>{{Form::submit('Update',array('style'=>'margin-top:10px','name'=>'save'))}}</a></li>
                        <li class="waves-effect waves-light"><a>{{Form::submit('Publish',array('style'=>'margin-top:10px','name'=>'save'))}}</a></li>
                        {{--<li class="waves-effect waves-light"><a href="#!">Update</a></li>--}}
                        <li class="waves-effect waves-light"><a href="#!">Cancle</a></li>
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
        $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');


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