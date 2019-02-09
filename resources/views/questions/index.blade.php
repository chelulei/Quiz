@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-4">
                <h2> All questions</h2>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-6">
                <form action="{{ route('questions') }}">
                    <div class="input-group">
                        <input type="text" class="form-control input-lg" value="{{ request('term') }}" name="term"
                               placeholder="Search for...">
                        <span class="input-group-btn">
                <button class="btn btn-lg btn-primary" type="submit">
                <i class="fa fa-search"></i>
                </button>
                </span>
                    </div>
                </form>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-2">
                <div class="ml-auto">
                    <a href="{{route('questions.create')}}" class="btn btn-primary">Ask Question</a>
                </div>
            </div>
            <!-- /.col-md-4 -->
        </div>
<!-- /.row -->
        <div class="row">
            <div class="col-md-8 col-xl-9 py-50">
                @if (! $questions->count())
                    <div class="alert alert-danger">
                        <strong>No record found</strong>
                    </div>
                @else
                <div class="row gap-y">

                    <div class="col-md-12">
                      @include('questions.alert')
                        @foreach($questions as $question)
                            <div class="card card-hover-shadow">
                                <div class="card mb-30">
                                    <div class="row align-items-center h-full">
                                        <div class="col-12 col-md-3">
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
                                        <div class="col-12 col-md-8">
                                            <div class="card-block">
                                                <h4 class="card-title"><a href="{{$question->url}}"> {{$question->title}}</a></h4>
                                                <p class="card-text">
                                                    {{$question->excerpt}}
                                                </p>
                                                <p class="card-text">
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
                                                </p>

                                                <p class="card-text">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-user"></i><a href="{{$question->user->url}}"> {{$question->user->name}}</a></li>
                                                    <li class="list-inline-item"><i class="fa fa-clock-o"></i> {{$question->date}}</li>
                                                    <li class="list-inline-item"><i class="fa fa-comments"></i><a href="#"> <strong>{{$question->answers_count}} </strong>
                                                            {{str_plural('answer',$question->answers_count)}}</a></li>
                                                </ul>

                                                <p class="pull-right card-text"><a href="{{$question->url}}">Read more &raquo;</a></p>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                        @endforeach

                    </div>

                </div>
                @endif
                        {{ $questions->appends(request()->only(['term']))->links()}}
            </div>



            <div class="col-md-4 col-xl-3 hidden-sm-down">
                <div class="sidebar">

                    @include('layouts.sidebar')

                </div>
            </div>

        </div>
    </div>
@endsection
