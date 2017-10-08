@extends('layouts.app')
@section('header','Create Tags')
@section('title','| Create Tags')

@section('styles')
    {!! Html::style('assets/css/select2.min.css') !!}
@endsection

@section('content')
    <div class="row remove-margin-bottom add-top-10 row-padding">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="row">
                    {!! Form::open(['route'=>'tags.store','method'=>'POST']) !!}
                    <div class="col s12 m12 l12">
                        <div class="input-field col s12 m10 l0">


                            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                            </select>
                            {{Form::label('tags','Tags')}}

                        </div>
                        <div class="col s12 m2 l2 add-top-20 right-align">
                            {{Form::submit('Create',['class'=>'waves-effect waves-light btn'])}}
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="col s12 m12 l12">




                    <div class="card-panel white z-depth-2 lighten-3 remove-margin-bottom padding-null">

                        <table class="highlight responsive-table bordered striped centered">
                            <thead>
                            <tr>
                                <th data-field="id">ID</th>
                                <th data-field="name">Title</th>

                                <th data-field="price"></th>
                                <!-- <th data-field="price"></th>
                                <th data-field="price"></th> -->
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($tags as $tag)
                            <tr>

                                <td>{{$tag->id}}</td>
                                <td>{{$tag->name}}</td>
                                <td>
                                    <div class="fixed-action-btn horizontal edit-button hide-on-med-and-down">
                                        <a class="btn-floating btn-small red">
                                            <i class="large material-icons">mode_edit</i>
                                        </a>
                                        <ul>
                                            <li><a class="btn-floating red" href="{{route('tags.edit',$tag->id)}}"><i class="material-icons">mode_edit</i></a></li>
                                            <li><a class="btn-floating yellow darken-1" href="{{route('tags.show',$tag->id)}}"><i class="material-icons">visibility</i></a></li>
                                            <li><a class="btn-floating green">{!! Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE']) !!}
                                                    {{Form::submit('Delete',['class'=>'btn btn-danger btn-xs'])}}
                                                    {!! Form::close() !!}
                                                </a></li>

                                        </ul>
                                    </div>
                                    <div class="hide-on-large-only">
                                        <div class="col s12 m12">
                                            edit
                                        </div><br>
                                        <div class="col s12 m12 add-top-10">
                                            View
                                        </div><br>
                                        <div class="col s12 m12 add-top-10 add-bottom-10">
                                            Delete
                                        </div>
                                    </div>
                                </td>

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