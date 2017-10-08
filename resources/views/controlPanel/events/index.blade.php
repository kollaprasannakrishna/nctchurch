@extends('layouts.app')
@section('header','All Events')
@section('title','| All Events')

@section('content')
    <div class="row remove-margin-bottom add-top-10 row-padding">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null">



                        <nav class="grad-back">
                            <div class="nav-wrapper">
                                <form>
                                    <div class="input-field">
                                        <input id="search_name" type="search" required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>

                        <table class="highlight responsive-table bordered striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Data</th>
                                <th>Time</th>
                                <th>Venue</th>
                                <th>Day</th>
                                <th>Type</th>
                                <th>Author</th>
                                <th data-field="edit"></th>
                                <!-- <th data-field="price"></th>
                                <th data-field="price"></th> -->
                            </tr>
                            </thead>

                            <tbody id="table">
                            @foreach($events as $event)
                                <tr class="{{$event->active =='YES'?'success    ':'danger'}}">
                                    <td>{{$event->id}}</td>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->description}}</td>
                                    <td>{{$event->date}}</td>
                                    <td>{{$event->time}}</td>
                                    <td>{{$event->venue->name }}</td>
                                    <td>{{$event->day}}</td>
                                    <td>{{$event->type}}</td>
                                    <td>{{$event->user->name}}</td>
                                    <td>
                                        <div class="fixed-action-btn horizontal edit-button hide-on-med-and-down">
                                            <a class="btn-floating btn-small red">
                                                <i class="large material-icons">mode_edit</i>
                                            </a>
                                            <ul>
                                                <li><a class="btn-floating red" href="{{route('events.edit',$event->id)}}" ><i class="material-icons">insert_chart</i></a></li>
                                                <li><a class="btn-floating yellow darken-1" href="{{route('events.show',$event->id)}}" ><i class="material-icons">format_quote</i></a></li>
                                                <li><a class="btn-floating green" href="{{route('events.delete',$event->id)}}" ><i class="material-icons">publish</i></a></li>
                                                {{--<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>--}}
                                            </ul>
                                        </div>
                                        <div class="hide-on-large-only">
                                            <div class="col s12 m12">
                                                <a href="{{route('events.edit',$event->id)}}" >Edit</a>
                                            </div><br>
                                            <div class="col s12 m12 add-top-10">
                                                <a href="{{route('events.show',$event->id)}}">View</a>
                                            </div><br>
                                            <div class="col s12 m12 add-top-10 add-bottom-10">
                                                <a href="{{route('events.delete',$event->id)}}">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>

                        <div class="col s12 m12 l12 center">
                            <ul class="pagination">
                                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                                <li class="active"><a href="#!">1</a></li>
                                <li class="waves-effect"><a href="#!">2</a></li>
                                <li class="waves-effect"><a href="#!">3</a></li>
                                <li class="waves-effect"><a href="#!">4</a></li>
                                <li class="waves-effect"><a href="#!">5</a></li>
                                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        {{$events->links()}}
    </div>
@endsection

@section('scripts')
    {!! Html::script('assets/js/paging.js') !!}
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script>
        var $rows = $('#table tr');
        $('#search_name').keyup(function() {

            var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
                    reg = RegExp(val, 'i'),
                    text;

            $rows.show().filter(function() {
                text = $(this).text().replace(/\s+/g, ' ');
                return !reg.test(text);
            }).hide();
        });
    </script>


@endsection