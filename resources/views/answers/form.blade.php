
@csrf
<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
    {!! Form::label('body','Explain your Answer') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control','rows' => 5, 'cols' =>5]) !!}
    @if($errors->has('body'))
        <strong >{{ $errors->first('body') }}</strong>
    @endif
</div>
<div class="box-footer">
    <button class="btn btn-primary btn-block" type="submit">Submit your Answer</button>
</div>