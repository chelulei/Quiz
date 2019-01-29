@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <!-- /.card-body -->
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h2> {{$question->title}}</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back All Questions</a>
                            </div><!-- /.ml-auto -->
                            </div>
                        <!-- /.d-flex align-items-center -->
                       </div>
                        <hr>
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This Question is useful"  class="vote-up">
                                <i class="fa fa-caret-up fa-2x" aria-hidden="true"></i>
                                </a>

                            <span class="votes-count">500</span>

                            <a title="This qustion is useful"  class="vote-down off">
                                <i class="fa fa-caret-down fa-2x" aria-hidden="true"></i>
                            </a>

                            <a title="Click to mark favorite question (Click again to undo)"
                               class="favorite mt-2 {{Auth::guest() ? 'off': ($question->is_favorited ? 'favorited':'')}}"
                               onclick="event.preventDefault(); document.getElementById('favorite-question-{{$question->id}}').submit();"
                            >
                                <i class="fa fa-star fa-2x"></i>
                                <span class="favorites-count">{{$question->favorites_count}}</span>
                              </a>
                            <form  id="favorite-question-{{$question->id}}" action="/questions/{{$question->id}}/favorites" method="POST" style="display: none;">
                                @csrf
                                @if($question->is_favorited)
                                    @method('DELETE')
                                    @endif
                            </form>
                        </div>
                        <!-- /.d-flex flex-column vote-controls -->
                        <div class="media-body">
                        {!! $question->body_html !!}
                        <div class="float-right">
                                    <span class="text-muted">
                                       {{ $question->date}}
                                    </span>
                            <div class="media mt-2">
                                <a href="{{ $question->user->url}}" class="pr-2">
                                    <img class="mr-3" src="{{$question->user->avatar}}" alt="Generic placeholder image">
                                </a>
                                <div class="media-body mt-1">
                                    <a href="{{ $question->user->url}}" class="pr-2">
                                        {{$question->user->name}}
                                    </a>
                                </div>
                                <!-- /.media-body -->
                            </div>
                            <!-- /.media -->
                        </div><!-- /.media-body -->
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @include('answers.index',[
        'answers'=>$question->answers,
        'answersCount'=>$question->answers_count
        ])
        @include('answers.create')
    </div>

@endsection
