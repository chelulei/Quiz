@extends('layouts.layout')

@section('title', 'Pride | account index')

@section('content')
    <div class="padding pt-150"></div>
    <div class="container">
        <div class="row pt-4">

            <div class="col-md-8 offset-1">
                @include('flash::message')
            </div>
            <div class="col-sm-1"></div>
            <!-- /.col-sm-2 -->
            <!-- /.col-md-8 -->
        </div>
    </div>
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
                                    <img src="{{$user->image_url}}" class="img-thumbnail" alt="Profile picture">
                                </div>

                                <!-- /.col-m-3 -->
                                <div class="col-md-4 mt-2">
                                    Name: <strong>{{$user->name}}</strong><hr>
                                    Email: <strong>{{$user->email}}</strong><hr>

                                </div>
                            </div>
                               <p class="pt-5">
                                       <a href="{{ route('backend.users.edit',$user->id)}}" class="btn btn-sm btn-outline-primary">
                                           EDIT DETAILS
                                       </a>
                               </p>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection

