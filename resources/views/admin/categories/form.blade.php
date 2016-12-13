
<div class="form-group">
	<label for="name">Name:</label>
	{!! Form::text('name', null , ['class' => 'form-control', 'id' =>'name']) !!}
</div>

<div class="form-group">
	<label for="visibility">Visibility:</label>
	{!! Form::select('visibility', ['0'=>'Hiding', '1' => 'Visible'], null, ['class' => 'form-control', 'id' =>'name']) !!}
</div>
<div class="form-group">
	<label for="ordring">Ordring:</label>
	{!! Form::number('ordring', null, ['class' => 'form-control', 'id' =>'ordring']) !!}
</div>

{!! Form::submit('Save Category', ['class' => 'btn btn-primary']) !!}
