@extends('layouts.layout')
@section('content')
    <header class="header header-inverse pt-100">
        <div class="container">
            <div class="row pt-2">
                <div class="col-md-12">
                    @include('flash::message')
                </div>
                <!-- /.col-md-8 -->
            </div>
        </div>
    </header>
    <!-- Start post-content Area -->
    <section class="post-content-area">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-2">
                    @include('layouts.sidebar-left')
                </div>
                <!-- End of side bar left -->
                <div class="col-lg-7 posts-list">
                    <div class="single-post row card p-5">
                        <div class="col-lg-12 col-md-12 ">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="open">Open Modal</button>
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
                <div class="col-lg-3 sidebar-widgets">
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

