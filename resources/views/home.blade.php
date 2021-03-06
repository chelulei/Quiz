@extends('layouts.layout')
@section('content')
    @include('partials.tinymce')
    <header class="header header-inverse pt-80">
        <div class="container">
            <div class="row mt-2">
                <div class="col-md-12">
                    @include('flash::message')
                </div>
                <!-- /.col-md-8 -->
            </div>
        </div>
    </header>
    <!-- Start post-content Area -->
    <section class="post-content-area" style="background-color: #EBF2F7;">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                        @include('layouts.sidebar-left')
                </div>
                <!-- End of side bar left -->
                <div class="col-lg-7 posts-list mt-3">
                    <div class="single-post row card p-5">
                        <div class="col-lg-12 col-md-12 ">
                            <div class="card-body">
                                <h5 class="card-title">Whats your questions?</h5>
                                <p class="card-text">Ask Any Squestion.</p>

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                                        <i class="fa fa-plus"></i>
                                        Questions
                                    </button>
                            </div>
                        </div>
                    </div>
                    @if (! $questions->count())
                        <div class="alert alert-info">
                            <strong>No record found</strong>
                        </div>
                    @else
                        @include('questions.alert')
                        @foreach($questions as $question)
                            <div class="single-post row card pb-4">
                                <div class="col-lg-12 col-md-12 ">
                                    <a class="posts-title" href="{{$question->url}}"><h3>{{$question->title}}</h3></a>
                                    <p class="excert">
                                        {{$question->excerpt}}
                                    </p>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['questions.destroy', $question->id, 'class' =>'form-delete']]) !!}
                                    @csrf
                                    @can('update',$question)
                                        <a href="{{route('questions.edit', $question->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                    @endcan
                                    @can('delete',$question)
                                        <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-times"></i>
                                            Delete
                                        </button>
                                    @endif
                                    {!! Form::close() !!}
                                    <p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="fa fa-user"></i><a href="{{$question->user->url}}"> {{$question->user->name}}</a></li>
                                        <li class="list-inline-item"><i class="fa fa-clock-o"></i> {{$question->date}}</li>
                                    </ul>
                                    <h3><a href="{{$question->url}}"> <span class="float-lg-right badge badge-info">Answer</span></a></h3>
                                    </p>

                                    <a href="{{$question->url}}" class="primary-btn">Read More</a>

                                </div>
                            </div>
                        @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                {{ $questions->appends(request()->only(['term']))->links()}}
                            </ul>
                        </nav>
                    @endif
                </div>
                <!-- Start of side bar left -->
                <div class="col-lg-3 sidebar-widgets mt-3">
                    <div class="widget-wrap">
                        @include('layouts.sidebar-right')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('partials.modals')
    <!-- End post-content Area -->

@endsection


