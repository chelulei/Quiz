@extends('layouts.main')

@section('content')
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       @include('flash::message')
                   </div>
                   <!-- /.col-md-8 -->
               </div>
           </div>
   <!-- /.container -->

                <!-- Start post-content Area -->
                <section class="post-content-area  pb-20" style="background-color: #EBF2F7">
                    <div class="container">
                        <div class="row ">
                            <div class="col-lg-8 posts-list card mt-3">
                                @if (! $questions->count())
                                    <div class="alert alert-info">
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
                                            </li>
                                        </ul>
                                        <h3><a href="{{$question->url}}"> <span class="float-lg-right badge badge-info">Answer</span></a></h3>
                                        </p>

                                        <a href="{{$question->url}}" class="primary-btn">Read More</a>

                                    </div>
                                </div>
                                    <hr>
                                @endforeach
                                <nav class="blog-pagination justify-content-center d-flex">
                                    <ul class="pagination">
                                        {{ $questions->appends(request()->only(['term']))->links()}}
                                    </ul>
                                </nav>
                                    @endif
                            </div>
                            <div class="col-lg-4 sidebar-widgets mt-3">
                                <div class="widget-wrap card ">
                              @include('layouts.sidebar')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End post-content Area -->
   @include('partials.modals')
      @endsection


