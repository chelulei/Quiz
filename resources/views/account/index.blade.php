@extends('layouts.layout')

@section('title', 'Pride | account index')

@section('content')
    <div class="padding pt-150"></div>
    <!-- /.padding -->
    <div class="content mt-3">
        <div class="animated fadeIn vh-100">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bg-primary p-2 mb-2 text-white text-center">
                                        PROFILE DETAILS
                                    </div>
                                </div>
                                <!-- /.col-md-12 -->
                                <div class="col-md-3 col-lg-3 " align="center">
                                    <img src="assets/img/default.png" class="img-thumbnail" alt="Profile picture">
                                </div>

                                <!-- /.col-m-3 -->
                                <div class="col-md-4 mt-2">
                                    Name: <strong>{{$user->name}}</strong><hr>
                                    Date Of Birth: <strong></strong><hr>
                                </div>
                                <div class="col-md-4">
                                    Telephone No: <strong></strong><hr>
                                    Email: <strong>{{$user->email}}</strong><hr>
                                </div>
                            </div>

                               <p class="text-center">
                                   <button class="btn btn-lg btn-outline-primary">EDIT</button>
                               </p>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection

