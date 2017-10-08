@extends('layouts.app')
@section('header','Compose Email')
@section('title','| Compose Email')
@section('styles')
    {!! Html::style('assets/css/select2.min.css') !!}
@endsection
@section('content')


    <div class="row remove-margin-bottom add-top-40">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null">

                        <div class="row">
                            <form id='form-select'>
                                <div class="col s6">
                                    <p style="float: right">
                                        <input class="with-gap" name="group3" type="radio" id="member_email" />
                                        <label for="member_email">Member Email</label>
                                    </p>
                                </div>
                                <div class="col s6">
                                    <p>
                                        <input class="with-gap" name="group3" type="radio" id="group_email" />
                                        <label for="group_email">Group Email</label>
                                    </p>

                                </div>
                            </form>

                        </div>


                    </div>


                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom" style='display:none' id="member_email_target">


                        <div class="row">
                            {!! Form::open(array('route'=>'emails.memberSave','class'=>'col s12','files'=>true)) !!}
                                <div class="row">
                                    <div class="input-field col s12 m12 l12">

                                        {{Form::select('to[]',$members,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}
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
                                        {{Form::text('subject',null,array('class'=>'form-control'))}}
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="row">
                                        <div class="input-field col s12 m12 l12">
                                            {{Form::label('body','Email Body:')}}
                                            {{Form::textarea('body',null,array('class'=>'form-control fileData'))}}

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


                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom" style='display:none' id="group_email_target">


                        <div class="row">
                            {!! Form::open(array('route'=>'emails.groupSave','class'=>'col s12','files'=>true)) !!}
                            <div class="row">
                                <div class="input-field col s12 m12 l12">

                                    {{Form::select('to[]',$groups,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}
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
                                    {{Form::text('subject',null,array('class'=>'form-control'))}}
                                </div>

                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="input-field col s12 m12 l12">
                                        {{Form::label('body','Email Body:')}}
                                        {{Form::textarea('body',null,array('class'=>'form-control fileData'))}}

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

                                <button class="btn waves-effect waves-light add-left-10" type="submit" name="save" style="float: right">Send
                                    <i class="material-icons right">send</i>
                                </button>
                                <button class="btn waves-effect waves-light" type="submit" name="save" style="float: right">Save
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
    <script>
        $(document)
                .ready(function () {
                    $("#member_email").click();
                });
        $('input[name=group3]').click(function () {
            if (this.id == "member_email") {
                $("#member_email_target").show('slow');
                $("#group_email_target").hide('slow');
            } else if (this.id == "group_email") {
                $("#member_email_target").hide('slow');
                $("#group_email_target").show('slow');
            }
        });

    </script>

@endsection