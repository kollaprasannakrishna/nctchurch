@if(Session::has('success'))
    <a class="btn" id="success" onclick="Materialize.toast('{{Session::get('success')}}', 4000)" style="visibility: hidden">Toast!</a>
@endif
@if(Session::has('failure'))
    <a class="btn" id="failure" onclick="Materialize.toast('{{Session::get('failure')}}', 4000)" style="visibility: hidden">Toast!</a>
@endif
@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <a class="btn" id="failure" onclick="Materialize.toast('{{$error}}', 4000)" style="visibility: hidden">Toast!</a>
    @endforeach
@endif
@section('scripts')
    <script>

            $("#success").trigger('click');


    </script>
@endsection