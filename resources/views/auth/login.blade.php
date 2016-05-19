@extends('layouts.app')

@section('content')
<br><br><br><br>

<div class="ui middle aligned center aligned grid">
    <div class="six wide column">
        <h2 class="ui blue header">
            <div class="content">
                Log in
            </div>
        </h2>
        <div class="ui blue segment">
            <form action="{{ url('/login') }}"  method="POST" class="ui form">
                {!! csrf_field() !!}                

                <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>Email</label>

                    <div class="ui huge left icon input">
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        <i class="user icon"></i>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Password</label>

                    <div class="ui huge left icon input">
                        <input type="password" class="form-control" name="password">
                        <i class="lock icon"></i>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="remember"> 
                        <label class="inverted">Remember Me</label>
                    </div>
                </div>

                <div class="field">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="ui button blue">
                            <i class="fa fa-btn fa-sign-in"></i>Login
                        </button>

                        <!-- <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
