@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All questions</div>

                    <div class="card-body">
                       @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                    <div class="vote">
                                        <strong> {{$question->votes}}  </strong>
                                        {{str_plural('vote',$question->votes)}}
                                      </div>
                                      <!-- /.vote -->
                                    <div class="status {{$question->status}} ">
                                        <strong> {{$question->answers}}  </strong>
                                        {{str_plural('answer',$question->answers)}}
                                    </div>
                                    <!-- /.status -->
                                    <div class="view">
                                        {{$question->views ." ". str_plural('view',$question->views)}}

                                    </div>
                                    <!-- /.view -->
                                  </div>
                                  <!-- /.d-flex flex-column counters -->
                                  <div class="media-body">
                                      <h3 class="mt-0">
                                          <a href="{{$question->url}}"> {{$question->title}}</a>
                                    </h3>
                                        {{str_limit($question->body,250)}}
                                    <p class="lead">
                                        Asked by <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                        <small class="text-muted">{{$question->created_date}}</small>
                                    </p>
                                    <!-- /.mt-0 -->
                                </div>
                                <!-- /.media-body -->
                            </div>
                            <!-- /.media -->
                            <hr>
                           @endforeach
                            {{ $questions->links()}}
                        <!-- /.jus-content -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
