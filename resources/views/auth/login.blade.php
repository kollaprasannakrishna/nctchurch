@extends('layouts.app')

@section('content')




<div class="row add-top-40">
    <div class="col s12 l4 offset-l4">
        <div class="card-panel">
            <div class="row">
                <form class="col s12" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <p>
                                <input type="checkbox" name="remember" id="remember" />
                                <label for="remember">Remember Me</label>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <button type="submit" class="waves-effect waves-light btn center">Login</button>
                            <a href="{{ url('/password/reset') }}">Forgot your password?</a>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>
























{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-8 col-md-offset-2">--}}
{{--<div class="panel panel-default">--}}
{{--<div class="panel-heading">Login</div>--}}
{{--<div class="panel-body">--}}
{{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">--}}
{{--{{ csrf_field() }}--}}

{{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
{{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

{{--@if ($errors->has('email'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('email') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
{{--<label for="password" class="col-md-4 control-label">Password</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password" type="password" class="form-control" name="password" required>--}}

{{--@if ($errors->has('password'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('password') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-md-6 col-md-offset-4">--}}
{{--<div class="checkbox">--}}
{{--<label>--}}
{{--<input type="checkbox" name="remember"> Remember Me--}}
{{--</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-md-8 col-md-offset-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--Login--}}
{{--</button>--}}

{{--<a class="btn btn-link" href="{{ url('/password/reset') }}">--}}
{{--Forgot Your Password?--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
@endsection
