@extends('site.layout')
@section('content')
<section class="panel">
	<hr>
	<div class="container">
		<div class="panel-body">
		@if(Session::has('message'))
			<div class="alert alert-info">{{Session::get('message')}}</div>
		@endif
			<form role='form' method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				
				<div class="form-group col-md-8">
					<label for="name">Name:</label>
					<input type="text" name="name" id='name'  class="form-control" value="{{ old('name') }}">
				</div>

			@if (count($errors) > 0)
			    <div class="alert alert-danger col-md-4">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
				<div class="form-group col-md-8">
					<label for="description">Description:</label>
					<textarea name="description" id='description'  class="form-control">{{old('description')}}</textarea>
				</div>

				<div class="form-group col-md-8">
					<label for="price">Price:</label>
					<input type="number" name="price" id='price'  class="form-control" value="{{ old('price') }}">
				</div>

				<div class="form-group col-md-8">
					<label for="categories">Categories:</label>
					<select name="categories" id="categories" class="form-control">
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach()
					</select>
				</div>

				<div class="form-group col-md-8">
					<label for="photos">photos:</label>
					<input type="file" name="photos[]" id='photos' multiple class="form-control" value="{{ old('photos') }}" required>
				</div>

				<div class="form-group col-md-8">
	        		<button type="submit" class="btn btn-primary">Add Advertising</button>
				</div>
			</form>
		</div>
	</div>
</section>
@stop()