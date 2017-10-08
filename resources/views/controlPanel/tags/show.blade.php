@extends('layouts.app')

@section('title','| '.$tag->name)

@section('styles')
    {!! Html::style('assets/css/select2.min.css') !!}
@endsection

@section('content')

    <div class="row remove-margin-bottom add-top-10 row-padding">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null">

                        <div class="row">
                            <div class="col s12">
                                <h5>{{$tag->posts->count()}} Posts are Associated </h5>
                                <hr>
                            </div>

                        </div>


                    </div>
                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null">

                        <table id="table" class="highlight responsive-table bordered striped">
                            <thead>
                            <tr>
                                <th data-field="id">ID</th>
                                <th data-field="name">Title</th>
                                <th data-field="price">Body</th>
                                <th data-field="price">Author</th>
                                <th data-field="price">Created</th>
                                <th data-field="price">Updated</th>
                                <th data-field="price"></th>
                                <!-- <th data-field="price"></th>
                                <th data-field="price"></th> -->
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($tag->posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{substr(strip_tags($post->body),0,5)}}{{strlen($post->body)>5?"....":""}}</td>
                                    <td>{{$post->slug}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td>
                                        <div class="fixed-action-btn horizontal edit-button">
                                            <a class="btn-floating btn-small red">
                                                <i class="large material-icons">mode_edit</i>
                                            </a>
                                            <ul>
                                                <li><a class="btn-floating red" href="{{route('posts.edit',$post->id)}}"><i class="material-icons">mode_edit</i></a></li>
                                                <li><a class="btn-floating yellow darken-1" href="{{route('posts.show',$post->id )}}"><i class="material-icons">visibility</i></a></li>
                                                <li><a class="btn-floating green" href="{{route('posts.delete',$post->id)}}"><i class="material-icons">delete</i></a></li>
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
            tokenSeparators: [',', ' ']
        });
    </script>
@endsection