@extends('layouts.login')
@section('content')

            <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">
                <h5 class="text-uppercase text-center">{{ __('Login') }}</h5>
                <br><br>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group flexbox py-10">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description"> {{ __('Remember Me') }}</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-muted hover-primary fs-13" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-bold btn-block btn-primary" type="submit"> {{ __('Login') }}</button>
                    </div>
                </form>

                <div class="divider">Or Sign In With</div>
                <div class="text-center">
                    <a class="btn btn-circular btn-sm btn-facebook mr-4" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="btn btn-circular btn-sm btn-google mr-4" href="#"><i class="fa fa-google"></i></a>
                    <a class="btn btn-circular btn-sm btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
                </div>

                <hr class="w-30">

                <p class="text-center text-muted fs-13 mt-20">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
            </div>


@endsection
