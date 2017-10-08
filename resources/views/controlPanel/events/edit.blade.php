@extends('layouts.app')
@section('header','Edit '. $event->name)
@section('title','| Edit Event')

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
                            {!! Form::model($event,['route'=>['events.update',$event->id],'files'=>true,'method'=>'PUT']) !!}
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 m4 l4">
                                        {{Form::label('name','Title:')}}
                                        {{Form::text('name',null,array('class'=>'validate'))}}

                                    </div>
                                    <div class="input-field col s12 m4 l4">

                                        {{ Form::label('time','Time:') }}
                                        {{Form::text('time',null,array('class'=>'timepicker validate'))}}


                                    </div>
                                    <div class="input-field col s12 m4 l4">


                                        {{--{{Form::label('type','Event Type')}}--}}
                                        <select name="type" id="mylist" value="{{$event->type}}">
                                            <option value="" disabled>Choose your option</option>
                                            <option value="weekly" @if($event->type == 'weekly') selected @endif>Weekly</option>
                                            <option value="monthly" @if($event->type == 'monthly') selected @endif>Monthly</option>
                                            <option value="special" @if($event->type == 'special') selected @endif>Special</option>
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

                                        {{Form::select('venue_id',$venues,null,['class'=>'validate'])}}
                                        {{Form::label('venue_id','Venue:')}}
                                    </div>
                                    <div class="input-field col s12 m4 l4">


                                        <select name="day" value="{{$event->day}}">
                                            <option value="" disabled>Choose your option</option>
                                            <option value="sunday" @if($event->day == 'Sunday') selected @endif>Sunday</option>
                                            <option value="monday" @if($event->day == 'Monday') selected @endif>Monday</option>
                                            <option value="tuesday" @if($event->day == 'Tuesday') selected @endif>Tuesday</option>
                                            <option value="wednesday" @if($event->day == 'Wednesday') selected @endif>Wednesday</option>
                                            <option value="thursday" @if($event->day == 'Thursday') selected @endif>Thursday</option>
                                            <option value="friday" @if($event->day == 'Friday') selected @endif>Friday</option>
                                            <option value="saturday" @if($event->day == 'Saturday') selected @endif>Saturday</option>

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
                                            <input class="file-path validate" type="text">
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
                                        {{Form::text('goal',is_null($event->fundraisingEvent)? null:$event->fundraisingEvent->goal,array('class'=>'validate'))}}
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

    {!! Html::script('assets/js/datedropper.js') !!}
    {!! Html::script('assets/js/timedropper.js') !!}
    {!! Html::script('assets/js/select2.min.js') !!}

    <script type="text/javascript">


        $('.select2-multi2').select2();

        $('.timepicker').timeDropper({
            setCurrentTime:false
        });

        $( document ).ready(function() {
            $("#mylist").change();
        });

        $('#mylist').change(function(){
            if( $(this).val() == 'monthly'){
                $('#monthsDay').show();
            }else{
                $('#monthsDay').hide();
            }
        });

        $(document).ready(function(){
            {{--{{dd(isset($event->relation))}}--}}
            @if(!is_null($event->fundraisingEvent))
                $('#donation').click();
            @else
                $('#donation_check').hide();
            @endif

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