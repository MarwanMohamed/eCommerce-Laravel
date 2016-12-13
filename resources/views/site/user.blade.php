@extends('site.layout')
@section('content')

<hr>
<section class="panel">
	<div class="panel-body">
	
@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>
@endif
		<form role='form' method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="id" value="{{ $user->id }}">
			
			<div class="form-group col-md-6">
				<label for="name">Name:</label>
				<input type="text" name="name" id='name' placeholder="Name" class="form-control" value="{{$user->name}}" >
			</div>

			<div class="form-group col-md-6">
				<label for="name">E-Mail Address:</label>
				<input type="email" name="email" id='email' placeholder="Email" class="form-control" value="{{$user->email}}">
			</div>

			<div class="form-group col-md-6">
				<label for="password">Password:</label>
				<input id="password" type="password" class="form-control" name="password">
			</div>
			<div class="form-group col-md-6">
				<label for="password-confirm">Confirm Password:</label>
				<input id="password-confirm" type="password" class="form-control" name="password_confirmation">
			</div>

			<div class="form-group">
				<label for="photo">Photo:</label><br>
				<img src="{{ asset('img/uploades/'. $user->photo ) }}" width="80" height="50""><br><br>
				<input type="file" id="photo" name="photo">
			</div>

			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
</section>


@stop()