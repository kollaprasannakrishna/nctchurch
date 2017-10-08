@extends('layouts.app')

@section('title','| Create Categories')
@section('styles')
    {!! Html::style('assets/css/select2.min.css') !!}
@endsection
@section('content')



    <div class="row remove-margin-bottom add-top-10 row-padding">
        <div class="col s12 m12 l12">
            <div class="row remove-margin-bottom">
                <div class="col s12 m12 l12">

                    <div class="row">
                        {!! Form::open(['route'=>['addmembers.update',$group->id],'method'=>'PUT']) !!}
                        <div class="col s12 m12 l12">
                            <div class="input-field col s12 m10 l10">

                                {{Form::label('members',$group->name)}}
                                {{Form::select('members[]',$member_names,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}

                            </div>
                            <div class="col s12 m2 l2 add-top-20">
                                {{Form::submit('Add',['class'=>'waves-effect waves-light btn'])}}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>


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
                            <tr>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{$member->id}}</td>
                                    <td>{{$member->firstname}}</td>
                                    <td>
                                        <div class="fixed-action-btn horizontal edit-button hide-on-med-and-down">
                                            <a class="btn-floating btn-small red">
                                                <i class="large material-icons">mode_edit</i>
                                            </a>
                                            <ul>
                                                <li><a class="btn-floating red" href="{{route('members.edit',$member->id)}}"><i class="material-icons">mode_edit</i></a></li>
                                                <li><a class="btn-floating yellow darken-1" href="{{route('members.show',$member->id)}}"><i class="material-icons">visibility</i></a></li>
                                                <li><a class="btn-floating green">{!! Form::open(['route'=>['addmembers.destroy',$member->id],'method'=>'DELETE']) !!}
                                                        {{Form::submit('Delete',['class'=>'btn btn-danger btn-xs'])}}
                                                        {!! Form::close() !!}
                                                    </a></li>

                                            </ul>
                                        </div>
                                        <div class="hide-on-large-only">
                                            <div class="col s12 m12">
                                                <a href="">Edit</a>
                                            </div><br>
                                            <div class="col s12 m12 add-top-10">
                                                <a href="">View</a>
                                            </div><br>
                                            <div class="col s12 m12 add-top-10 add-bottom-10">
                                                <a>{!! Form::open(['route'=>['addmembers.destroy',$member->id],'method'=>'DELETE']) !!}
                                                    {{Form::submit('Delete',['class'=>'btn btn-danger btn-xs'])}}
                                                    {!! Form::close() !!}</a>
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
    <div class="col s12 m12 l12 center">

    </div>





@stop


@section('scripts')
    {!! Html::script('assets/js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2({
            tags: false,
            tokenSeparators: [',', ' ']
        });

    </script>
@endsection