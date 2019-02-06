@extends('layouts.login')

@section('content')

                <div class="card card-shadowed p-50 w-500 mb-0" style="max-width: 100%">
                    <h5 class="text-uppercase text-center">{{ __('Reset Password') }}</h5>
                    <br><br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">

                                <input id="email" placeholder="E-Mail Address" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                        </div>
                    </form>
            </div>

@endsection
