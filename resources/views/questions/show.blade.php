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
                            <a title="This Question is useful"
                               class="vote-up {{Auth::guest() ? 'off': ''}}"
                               onclick="event.preventDefault(); document.getElementById('up-vote-question-{{$question->id}}').submit();"
                            >
                                <i class="fa fa-caret-up fa-2x" aria-hidden="true"></i>
                                </a>
                            <form  id="up-vote-question-{{$question->id}}" action="/questions/{{$question->id}}/vote" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="vote" value="1">
                            </form>
                            <span class="votes-count">{{$question->votes_count}}</span>

                            <a title="This qustion is useful"  class="vote-down {{Auth::guest() ? 'off': ''}}"
                               onclick="event.preventDefault(); document.getElementById('down-vote-question-{{$question->id}}').submit();"
                            >
                                <i class="fa fa-caret-down fa-2x" aria-hidden="true"></i>
                            </a>

                            <form  id="down-vote-question-{{$question->id}}" action="/questions/{{$question->id}}/vote" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="vote" value="-1">
                            </form>

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
                        @include('shared.vote',[
                        'model' => $question
                        ])
                        <!-- /.d-flex flex-column vote-controls -->
                        <div class="media-body">
                        {!! $question->body_html !!}
                        <div class="row">
                            <div class="col-4"></div>
                            <!-- /.col-4 -->
                            <div class="col-4"></div>
                            <!-- /.col-4 -->
                            <div class="col-4">
                                @include('shared.author',[
                            'model'=>$question,
                            'label'=>'asked'
                            ])
                            </div>
                            <!-- /.col-4 -->
                        </div>
                        <!-- /.row -->
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
