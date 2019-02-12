@extends('layouts.main')

@section('content')
    <div class="container">
        @include('layouts._messages')
        <div class="row justify-content-center vh-100 mt-150">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2> Ask question</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to All Questions</a>
                            </div><!-- /.ml-auto -->
                        </div>
                        <!-- /.d-flex align-items-center -->
                    </div>

                    <div class="card-body">
                        {!! Form::model($question, [
                                          'method' => 'POST',
                                          'route'  => 'questions.store',
                                          'files'  => TRUE,
                                          'id' => 'question-form',
                                          'class'=>'class="was-validated'
                                      ]) !!}

                        @include('questions.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
