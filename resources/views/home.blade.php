@extends('layouts.layout')
@section('content')
    <header class="header header-inverse pt-150" style="background-color: #69BE00">
        <div class="container text-center">

            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">

                    <h1>Latest Questions</h1>
                    <p class="fs-20 opacity-70 pt-1">
                        <a href="{{route('questions.create')}}" class="btn btn-primary">Ask Question</a>
                    </p>

                </div>
            </div>

        </div>
    </header>
    <section class="post-content-area">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 posts-list">
                    @if (! $questions->count())
                        <div class="alert alert-danger">
                            <strong>No record found</strong>
                        </div>
                    @else
                        @include('questions.alert')
                        @foreach($questions as $question)
                            <div class="single-post row">
                                <div class="col-lg-3  col-md-3 meta-details">
                                </div>
                                <div class="col-lg-9 col-md-9 ">

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
                                        <li class="list-inline-item"><i class="fa fa-comments"></i>
                                            <a href="{{$question->url}}">
                                                <span class="badge badge-info">Answer</span>
                                            </a>
                                        </li>
                                    </ul>
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
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        @include('layouts.sidebar')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->
@endsection


