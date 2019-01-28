@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <h3 class="card-title">EDIT Answer for question: <strong>{{$question->title}}</strong></h3>
                <hr>
                {!! Form::model($answer, ['route'=>['questions.answers.update', $question->id, $answer->id],
                  'method'=>'PATCH']) !!}
                    @csrf
                <div class="form-group">
                    {!! Form::label('body', 'Description:',['class' => 'control-label']) !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                        {!! $errors->has('body')?$errors->first('body'):''!!}
                </div>
                <div class="form-group">
                        {!! Form::submit('Update',['class' => 'btn btn-lg btn-outline-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection