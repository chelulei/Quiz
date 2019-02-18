@extends('layouts.layout')

@section('title', 'Pride | account Edit')

@section('content')
    <div class="row mt-150">
        <div class="col-lg-8 offset-2">
            <div class="card card">
                <div class="card-header">
                    <strong>Edit Form</strong>
                    <strong class="float-lg-right">
                        <a href="{{route('backend.account.index')}}" class="btn btn-outline-info text-success">
                           <i class="fa fa-arrow-left"></i>
                            Back
                        </a>
                    </strong>
                </div>
                <div class="card-body card-block">
                    {!! Form::model($user, [
                                     'method' => 'PUT',
                                     'files'  => TRUE,
                                     'route'  => ['backend.users.update', $user->id],

                                 ]) !!}

                    @include('users.form2')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <!-- /.row -->
@endsection




