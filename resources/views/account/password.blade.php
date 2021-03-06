@extends('layouts.layout')

@section('title', 'Pride | users ')

@section('content')
    <div class="padding pt-150"></div>
    <div class="row">
        <div class="col-md-8 offset-2">
            @include('flash::message')
        </div>
        <div class="col-sm-1"></div>
        <!-- /.col-sm-2 -->
        <!-- /.col-md-8 -->
    </div>
    <div class="content mt-3">
        <div class="row vh-100">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bg-primary pl-3 p-2 mb-2 text-white">
                                   Change Password
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                            <div class="col-md-10 offset-2">
                                <form class="form-horizontal" method="POST" action="{{ route('profile.update', ['user' => $user]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                        <label for="new-password" class="col-md-4 control-label">Current Password</label>

                                        <div class="col-md-8">
                                            <input id="current-password" type="password" class="form-control" name="current-password" required>

                                            @if ($errors->has('current-password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="hidden" name="book_id" value="{{ request()->route('id') }}">
                                        <div class="form-group">
                                            <label for="new-password">new-password:</label>
                                            <input type="password" name="new-password" class="form-control {{ $errors->has('new-password') ? 'is-invalid' : ''}}" id="new-password" required>
                                            @if($errors->has('new-password'))
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('new-password') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                                        <div class="col-md-8">
                                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.div -->

                    </div>
                </div>
            </div>

        </div>
    </div><!-- .content -->
@endsection
