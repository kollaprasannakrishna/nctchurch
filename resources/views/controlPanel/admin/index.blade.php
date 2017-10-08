@extends('layouts.app')

@section('title','| Admin')

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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th></th>
                                <!-- <th data-field="price"></th>
                                <th data-field="price"></th> -->
                            </tr>
                            </thead>

                            <tbody id="table">
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            |{{$role->name}}|
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="fixed-action-btn horizontal edit-button">
                                            <a class="btn-floating btn-small red">
                                                <i class="large material-icons">mode_edit</i>
                                            </a>
                                            <ul>
                                                <li><a class="btn-floating red" href="{{route('admin.edit',$user->id)}}"><i class="material-icons">mode_edit</i></a></li>
                                                {{--<li><a class="btn-floating yellow darken-1" href="{{route('posts.show',$post->id )}}"><i class="material-icons">visibility</i></a></li>--}}
                                                <li><a class="btn-floating green">{!! Form::open(['route'=>['admin.destroy',$user->id],'method'=>'DELETE']) !!}
                                                        {{Form::submit('Delete',['class'=>'btn btn-danger btn-xs'])}}
                                                        {!! Form::close() !!}</a></li>
                                                {{--<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>--}}
                                            </ul>
                                        </div>
                                        <div class="hide-on-large-only">
                                            <div class="col s12 m12">
                                                <a href="{{route('admin.edit',$user->id)}}" class="btn btn-primary btn-xs">Edit</a>
                                            </div><br>

                                            <div class="col s12 m12 add-top-10 add-bottom-10">
                                                <a>{!! Form::open(['route'=>['admin.destroy',$user->id],'method'=>'DELETE']) !!}
                                                    {{Form::submit('Delete',['class'=>'btn btn-danger btn-xs'])}}
                                                    {!! Form::close() !!}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td><i class="material-icons small">mode_edit</i></td>
                                    <td><i class="material-icons small">delete</i></td> -->
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                        <div class="col s12 m12 l12 center">
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
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