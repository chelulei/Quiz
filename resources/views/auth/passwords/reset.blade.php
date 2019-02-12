@extends('layouts.login')

@section('content')

    <div class="login-content">
        <div class="login-logo">
            <a href="#">
                <img class="align-content" src="backend/images/logo.png" alt="">
            </a>
            {{--<h5 class="text-uppercase text-center">{{ __('Login') }}</h5>--}}
        </div>
        <div class="login-form">
                    <h5 class="text-uppercase text-center">{{ __('Reset Password') }}</h5>
                    <br><br>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                                <input id="email" placeholder="E-Mail Address" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group row">
                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group row">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Reset Password') }}
                                </button>

                        </div>
                    </form>
                </div>
    </div>

@endsection
