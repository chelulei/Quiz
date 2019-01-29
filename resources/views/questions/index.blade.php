@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2> All questions</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Ask Question</a>
                            </div><!-- /.ml-auto -->
                            </div>
                        <!-- /.d-flex align-items-center -->
                       </div>

                    <div class="card-body">
                        @include('layouts._messages')
                       @foreach($questions as $question)
                            <div class="media">
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
                                  <!-- /.d-flex flex-column counters -->
                                  <div class="media-body">
                                      <div class="d-flex align-items-center">
                                          <a href="{{$question->url}}"> {{$question->title}}</a>
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
                                      </div>
                                      <!-- /.d-flex align-items-center -->
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
