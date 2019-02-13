@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row mt-150">
            <div class="col-md-12">
                @include('flash::message')
            </div>
            <!-- /.col-md-8 -->
        </div>
        <div class="row justify-content-center vh-100">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2> Ask question</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-primary">
                                   <i class="fa fa-arrow-left"></i> Back To all Questions
                                </a>
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
