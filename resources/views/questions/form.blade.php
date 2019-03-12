
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
        {{--{!! Form::label('Subject','Choose Subject') !!}--}}
    {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Choose Subject','required']) !!}
    @if($errors->has('category_id'))
        <span class="help-block">{{ $errors->first('category_id') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
    {!! Form::label('body','Explain your Question') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control my-editor','rows' => 5, 'cols' =>5]) !!}
    @if($errors->has('body'))
        <span class="help-block">{{ $errors->first('body') }}</span>
    @endif
</div>
<div class="form-group">
        <button type="submit" class="btn btn-outline-primary btn-lg">{{ $question->exists ? 'Update' : 'Save' }}</button>
        <a href="{{ route('questions.index') }}" class="btn btn-outline-danger btn-lg" role="button" aria-pressed="true">Cancel</a>
</div>