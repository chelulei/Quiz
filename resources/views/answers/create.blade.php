<div class="card mt-4">
    <div class="card-body">

           <h3 class="card-title">Your Answer</h3>
        <hr>
        {!! Form::open([
                  'method' => 'POST',
                  'route'  =>['questions.answers.store', $question->id],
                  'files'  => TRUE,
                  'id' => 'question-form',
                  'class'=>'class="was-validated'
              ]) !!}

        @include('answers.form')

        {!! Form::close() !!}
    </div>
</div>