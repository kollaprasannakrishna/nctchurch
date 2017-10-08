@extends('layouts.app')

@section('title','| Create Categories')
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
                            {!! Form::model($email,['route'=>['emails.update',$email->id],'method'=>'PUT']) !!}
                            <div class="row">
                                <div class="input-field col s12 m12 l12">

                                    @if($email->type == 'group')
                                        {{Form::select('to[]',$groups,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}
                                    @else
                                        {{Form::select('to[]',$members,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}
                                    @endif
                                    {{Form::label('to','To')}}
                                </div>

                            </div>

                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    {{ Form::label('cc','CC') }}
                                    {{Form::text('cc',null,array('class'=>'validate'))}}
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    {{ Form::label('subject','Subject') }}
                                    {{Form::text('Subject',null,array('class'=>'validate'))}}
                                </div>

                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="input-field col s12 m12 l12">
                                        {{Form::label('body','Email Body:')}}
                                        {{Form::textarea('body',null,array('class'=>'validate fileData'))}}

                                    </div>
                                </div>
                            </div>



                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Attachments</span>
                                    <input type="file" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                </div>
                            </div>

                            <div class="col s12">


                                <button class="btn waves-effect waves-light add-left-10" type="submit" name="save" style="float: right" value="Send">Send
                                    <i class="material-icons right">send</i>
                                </button>
                                <button class="btn waves-effect waves-light" type="submit" name="save" style="float: right" value="Save">Save
                                    <i class="material-icons right">send</i>
                                </button>

                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


@stop


@section('scripts')
    {!! Html::script('assets/js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            width: '100%'
        });
        @if($email->type == 'group')
        $('.select2-multi').select2().val({!! json_encode($email->groups()->getRelatedIds()) !!}).trigger('change');
        @else
            $('.select2-multi').select2().val({!! json_encode($email->members()->getRelatedIds()) !!}).trigger('change');
        @endif
    </script>
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