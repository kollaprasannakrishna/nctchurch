@extends('layouts.app')

@section('header','Dashboard')
@section('content')


    <div class="row add-top-10 add-left-10 add-right-10 z-depth-2">
        <div class="col s12 m6 l3 schedule-right-color waves-effect waves-light">

            <div class="col s4 schedule-left-color">
                <h4><i class="medium material-icons">schedule</i></h4>
            </div>
            <div class="col s8 center">
                <h5>3231</h5>
                <p>Uploads</p>
            </div>
        </div>

        <div class="col s12 m6 l3 eye-right-color">

            <div class="col s4 eye-left-color">
                <h4><i class="medium material-icons">visibility</i></h4>
            </div>
            <div class="col s8 center">
                <h5>3231</h5>
                <p>Web Views</p>
            </div>
        </div>

        <div class="col s12 m6 l3 message-right-color">

            <div class="col s4 message-left-color">
                <h4><i class="medium material-icons">message</i></h4>
            </div>
            <div class="col s8 center">
                <h5>3231</h5>
                <p>Messages</p>
            </div>
        </div>

        <div class="col s12 m6 l3 volume-right-color">

            <div class="col s4 volume-left-color">
                <h4><i class="medium material-icons">ring_volume</i></h4>
            </div>
            <div class="col s8 center">
                <h5>3231</h5>
                <p>Uploads</p>
            </div>
        </div>
    </div>


@endsection
