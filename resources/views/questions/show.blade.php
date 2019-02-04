@extends('layouts.main')
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
                                    <a href="{{route('questions.index')}}" class="btn btn-outline-info text-success">
                                        Back All Questions
                                    </a>
                                </div><!-- /.ml-auto -->
                            </div>
                            <!-- /.d-flex align-items-center -->
                        </div>
                        <hr>
                        <div class="media">
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