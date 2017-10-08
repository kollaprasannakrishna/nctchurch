@extends('layouts.app')
@section('header','Create Event')
@section('title','| Create Event')

@section('styles')
    {!! Html::style('assets/css/datedropper.css') !!}
    {!! Html::style('assets/css/timedropper.css') !!}

    {!! Html::style('assets/css/select2.min.css') !!}


@endsection

@section('content')

    <div class="row remove-margin-bottom add-top-40">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom">


                        <div class="row">
                            {!! Form::open(['route'=>'events.store','files'=>true,'id'=>'eventForm']) !!}
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 m4 l4">
                                        {{Form::label('name','Title:')}}
                                        {{Form::text('name',null,array('class'=>'validate'))}}

                                    </div>
                                    <div class="input-field col s12 m4 l4">

                                        {{ Form::label('time','Time:') }}
                                        <input type="text" class="form-control timepicker validate" name="time">


                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        {{--{{Form::label('type','Event Type')}}--}}
                                        <select class="form-control" name="type" id="mylist">
                                            <option value="" disabled selected>Choose your option</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="special">Special</option>
                                        </select>

                                        <label>Type</label>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="input-field col s12 m4 l4">
                                        {{ Form::label('date','Date:') }}
                                        {{Form::date('date',null,['class'=>'datepicker'])}}

                                    </div>
                                    <div class="input-field col s12 m4 l4">

                                        <select name="venue_id">
                                            <option value="" disabled selected>Choose your option</option>
                                            @foreach($venues as $venue)
                                                <option value="{{$venue->id}}">{{$venue->name }}</option>
                                            @endforeach

                                        </select>
                                        {{Form::label('venue_id','Venue:')}}
                                    </div>
                                    <div class="input-field col s12 m4 l4">

                                        <select name="day">
                                            <option value="" disabled selected>Choose your option</option>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>

                                        </select>
                                        {{Form::label('day','Event Day')}}
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="file-field input-field col s8">
                                        <div class="btn">
                                            <span>Featured Image</span>
                                            {{Form::file('featured_image')}}
                                        </div>
                                        <div class="file-path-wrapper">
                                            {{Form::text('featured_image',null,['class'=>'file-path validate'])}}
                                        </div>
                                    </div>
                                    {{--<div class="col s4">--}}
                                        {{--<input type="checkbox" id="donation" name="donation" />--}}
                                        {{--<label for="donation">Needs donation?</label>--}}

                                    {{--</div>--}}
                                    <div class="input-field col s12 m6 l6" id="monthsDay">

                                        <select  multiple='multiple' name='monthsDay[]' >
                                            <option value="" disabled selected>Choose your option</option>
                                            <option value='1'>1st Month</option>
                                            <option value='2'>2nd Month</option>
                                            <option value='3'>3rd Month</option>
                                            <option value='4'>4th Month</option>
                                            <option value='5'>5th Month</option>
                                        </select>
                                        {{Form::label('day','Event Day')}}
                                    </div>
                                </div>
                                <div class="row"  id="donation_check">
                                    <div class="col s4">
                                        {{Form::label('goal','Estimated Amount:')}}
                                        {{Form::number('goal',null,array('class'=>'validate','placeholder'=>'0.00'))}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="row">
                                        <div class="input-field col s12 m12 l12">
                                            {{Form::label('description','Event Description:')}}
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
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')

{{--    {!! Html::script('assets/js/datedropper.js') !!}--}}
    {!! Html::script('assets/js/timedropper.js') !!}
    {!! Html::script('assets/js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi2').select2();
//            $('.datepicker').dateDropper();
            $('.timepicker').timeDropper();


            $('#mylist').change(function(){
                if( $(this).val() == 'monthly'){
                    $('#monthsDay').show();
                }else{
                    $('#monthsDay').hide();
                }
            });

        $(document).ready(function(){
            $('#donation_check').hide();
            $('#monthsDay').hide();
        });



        $('#donation').change(function(){
            if($(this).prop("checked")) {
                $('#donation_check').show();
            } else {
                $('#donation_check').hide();
            }
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


@endsection