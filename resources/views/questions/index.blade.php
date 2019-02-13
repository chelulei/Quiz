@extends('layouts.main')

@section('content')
@section('style')
    @endsection
   <div class="container">
       <div class="row pt-4">
           <div class="col-md-12">
               @include('flash::message')
           </div>
           <!-- /.col-md-8 -->
       </div>
   </div>
   <!-- /.container -->
    <section class="top-category-widget-area pt-30 pb-30 ">
        <div class="container">
            <div class="row mt-2">
                <div class="col-md-8 offset-2">
                    <h2> All questions</h2>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-2">
                    <div class="ml-auto">
                        <a href="{{route('questions.create')}}" class="btn btn-primary">Ask Question</a>
                    </div>
                </div>
                <!-- /.col-md-4 -->
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /.row -->
                <!-- Start post-content Area -->
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

                                        <div class="d-flex flex-column counters">
                                            <div class="vote">
                                                <strong> {{$question->votes_count}}  </strong>
                                                {{str_plural('vote',$question->votes_count)}}
                                            </div>
                                            <!-- /.vote -->
                                            <div class="status {{$question->status}} ">
                                                <strong> {{$question->answers_count}}  </strong>
                                                {{str_plural('answer',$question->answers_count)}}
                                            </div>
                                            <!-- /.status -->
                                            <div class="view">
                                                {{$question->views ." ". str_plural('view',$question->views)}}

                                            </div>
                                            <!-- /.view -->
                                        </div>

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


