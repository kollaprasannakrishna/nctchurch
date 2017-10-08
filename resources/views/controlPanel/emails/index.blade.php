@extends('layouts.app')

@section('title','| All Emails')

@section('content')

    <div class="row remove-margin-bottom add-top-10 row-padding">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null">

                        <div class="row">
                            <form id='form-select'>
                                <div class="col s6">
                                    <p style="float: right">
                                        <input class="with-gap" name="group3" type="radio" id="sent_email" />
                                        <label for="sent_email">Sent Emails</label>
                                    </p>
                                </div>
                                <div class="col s6">
                                    <p>
                                        <input class="with-gap" name="group3" type="radio" id="draft_email" />
                                        <label for="draft_email">Draft Emails</label>
                                    </p>

                                </div>
                            </form>

                        </div>


                    </div>

                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null" style='display:none' id="sent-target">
                        <nav class="grad-back">
                            <div class="nav-wrapper">
                                <form>
                                    <div class="input-field">
                                        <input id="search" type="search" required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>

                        <table id="table" class="highlight responsive-table bordered striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Body</th>
                                <th>Sent By</th>
                                <th>Group/Member</th>
                                <th>Status</th>
                                <th data-field="price"></th>
                                <!-- <th data-field="price"></th>
                                <th data-field="price"></th> -->
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($emails as $email)
                                @if($email->status == 'sent')
                                <tr>
                                    <td>{{$email->id}}</td>
                                    <td>{{$email->Subject}}</td>
                                    <td>{{substr(strip_tags($email->body),0,5)}}{{strlen($email->body)>5?"....":""}}</td>
                                    <td>{{$email->user->name}}</td>
                                    @if($email->type == "group")
                                        <td>Group</td>
                                    @else
                                        <td>Member</td>
                                    @endif
                                    <td>{{$email->status}}</td>
                                    <td>
                                        <div class="fixed-action-btn horizontal edit-button">
                                            <a class="btn-floating btn-small red">
                                                <i class="large material-icons">mode_edit</i>
                                            </a>
                                            <ul>
                                                <li><a class="btn-floating red" href="{{route('emails.editEmail',$email->id)}}"><i class="material-icons">mode_edit</i></a></li>
                                                <li><a class="btn-floating yellow darken-1" href="#"><i class="material-icons">visibility</i></a></li>
                                                <li><a class="btn-floating green" href="#"><i class="material-icons">delete</i></a></li>
                                                {{--<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>--}}
                                            </ul>
                                        </div>
                                        <div class="hide-on-large-only">
                                            <div class="col s12 m12">
                                                <a href="{{route('emails.editEmail',$email->id)}}" class="btn btn-primary btn-xs">Edit</a>
                                            </div><br>
                                            <div class="col s12 m12 add-top-10">
                                                <a href="#" class="btn btn-success btn-xs"> View</a>
                                            </div><br>
                                            <div class="col s12 m12 add-top-10 add-bottom-10">
                                                <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td><i class="material-icons small">mode_edit</i></td>
                                    <td><i class="material-icons small">delete</i></td> -->
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                        <div class="col s12 m12 l12 center">
                            {{$emails->links()}}
                        </div>
                    </div>

                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null" style='display:none' id="draft-target">
                        <nav class="grad-back">
                            <div class="nav-wrapper">
                                <form>
                                    <div class="input-field">
                                        <input id="search" type="search" required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>

                        <table id="table" class="highlight responsive-table bordered striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Body</th>
                                <th>Sent By</th>
                                <th>Group/Member</th>
                                <th>Status</th>
                                <th data-field="price"></th>
                                <!-- <th data-field="price"></th>
                                <th data-field="price"></th> -->
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($emails as $email)
                                @if($email->status == 'draft')
                                <tr>
                                    <td>{{$email->id}}</td>
                                    <td>{{$email->Subject}}</td>
                                    <td>{{substr(strip_tags($email->body),0,5)}}{{strlen($email->body)>5?"....":""}}</td>
                                    <td>{{$email->user->name}}</td>
                                    @if($email->type == "group")
                                        <td>Group</td>
                                    @else
                                        <td>Member</td>
                                    @endif
                                    <td>{{$email->status}}</td>
                                    <td>
                                        <div class="fixed-action-btn horizontal edit-button">
                                            <a class="btn-floating btn-small red">
                                                <i class="large material-icons">mode_edit</i>
                                            </a>
                                            <ul>
                                                <li><a class="btn-floating red" href="{{route('emails.editEmail',$email->id)}}"><i class="material-icons">mode_edit</i></a></li>
                                                <li><a class="btn-floating yellow darken-1" href="#"><i class="material-icons">visibility</i></a></li>
                                                <li><a class="btn-floating green" href="#"><i class="material-icons">delete</i></a></li>
                                                {{--<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>--}}
                                            </ul>
                                        </div>
                                        <div class="hide-on-large-only">
                                            <div class="col s12 m12">
                                                <a href="{{route('emails.editEmail',$email->id)}}" class="btn btn-primary btn-xs">Edit</a>
                                            </div><br>
                                            <div class="col s12 m12 add-top-10">
                                                <a href="#" class="btn btn-success btn-xs"> View</a>
                                            </div><br>
                                            <div class="col s12 m12 add-top-10 add-bottom-10">
                                                <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td><i class="material-icons small">mode_edit</i></td>
                                    <td><i class="material-icons small">delete</i></td> -->
                                </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>

                        <div class="col s12 m12 l12 center">
                            {{$emails->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(document)
                .ready(function () {
                    $("#draft_email").click();
                });
        $('input[name=group3]').click(function () {
            if (this.id == "sent_email") {
                $("#sent-target").show('slow');
                $("#draft-target").hide('slow');
            } else if (this.id == "draft_email") {
                $("#sent-target").hide('slow');
                $("#draft-target").show('slow');
            }
        });

    </script>
@endsection