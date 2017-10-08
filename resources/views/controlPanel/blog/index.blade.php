@extends('layouts.app')

@section('header','All Posts')
@section('title','| All Posts')

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
                                <th data-field="id">ID</th>
                                <th data-field="name">Title</th>
                                <th data-field="price">Body</th>
                                <th data-field="price">Link</th>
                                <th data-field="price">Category</th>
                                <th data-field="price">Author</th>
                                <th data-field="price"></th>
                                <!-- <th data-field="price"></th>
                                <th data-field="price"></th> -->
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td title="{{$post->title}}">{{substr(strip_tags($post->title),0,10)}}{{strlen($post->title)>10?"....":""}}</td>
                                    <td>{{substr(strip_tags($post->body),0,80)}}{{strlen($post->body)>80?"....":""}}</td>
                                    <td><a href="{{route('blog.single',$post->slug)}}" target="_blank"> link </a></td>
                                    <td>{{$post->category->name}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>
                                        <div class="fixed-action-btn horizontal edit-button">
                                            <a class="btn-floating btn-small red">
                                                <i class="large material-icons">mode_edit</i>
                                            </a>
                                            <ul>
                                                <li><a class="btn-floating yellow darken-1" href="{{route('posts.show',$post->id )}}"><i class="material-icons">visibility</i></a></li>

                                            @if(Auth::user() == $post->user)
                                                <li><a class="btn-floating red" href="{{route('posts.edit',$post->id)}}"><i class="material-icons">mode_edit</i></a></li>
                                                <li><a class="btn-floating green" href="{{route('posts.delete',$post->id)}}"><i class="material-icons">delete</i></a></li>
                                                @endif

                                                {{--<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>--}}
                                            </ul>
                                        </div>
                                        <div class="hide-on-large-only">
                                            <div class="col s12 m12">
                                                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-xs">Edit</a>
                                            </div><br>
                                            <div class="col s12 m12 add-top-10">
                                                <a href="{{route('posts.show',$post->id )}}" class="btn btn-success btn-xs"> View</a>
                                            </div><br>
                                            <div class="col s12 m12 add-top-10 add-bottom-10">
                                                <a href="{{route('posts.delete',$post->id)}}" class="btn btn-danger btn-xs">Delete</a>
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
                            {{$posts->links()}}
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
    var $rows = $('#table tbody tr');
    $('#search').keyup(function() {

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