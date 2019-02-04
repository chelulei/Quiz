@extends('layouts.main')
@section('content')
    <section class="section bg-gray">
        <div class="container">
            @foreach($questions as $question)
            <div class="card mb-30">
                <div class="row align-items-center h-full">
                    <div class="col-12 col-md-2">
                        <div class="counters ">
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

                    <div class="col-12 col-md-10">
                        <div class="card-block">
                            <h4 class="card-title"><a href="{{$question->url}}"> {{$question->title}}</a></h4>
                            <div class="ml-auto">

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
                            </div><!-- /.ml-auto -->
                            <div class="excerpt">
                            <p class="card-text">
                                {{$question->excerpt}}
                            </p>
                                <p class="lead">
                                    Asked by <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                    <small class="text-muted">{{$question->created_date}}</small>
                                </p>
                            </div>
                            <a class="fw-600 fs-12" href="{{$question->url}}">Read more <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
                {{ $questions->links()}}
        </div>
    </section>

@endsection