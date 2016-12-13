@extends('admin.templet.AdminLayout')

@section('content')

<section id="container" class="">
	<section id="main-content">
		<section class="wrapper">            
			<!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-shopping-cart"></i> Items</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="/admin">Home</a></li>
						<li><i class="fa fa-shopping-cart"></i><a href="/admin/items">Items</a></li>
						<li><i class="fa fa-plus"></i>Add</li>                          
					</ol>
				</div>
			</div>
			

			<section class="panel">
				<header class="panel-heading">
					Add Item
				</header>
				<div class="panel-body">
					<form role='form' method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
						
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" name="name" id='name'  class="form-control" value="{{ old('name') }}">
						</div>

						<div class="form-group">
							<label for="description">Description:</label>
							<textarea name="description" id='description'  class="form-control">{{old('description')}}</textarea>
						</div>
						<div class="form-group">
							<label for="price">Price:</label>
							<input type="number" name="price" id='price'  class="form-control" value="{{ old('price') }}">
						</div>

						<div class="form-group">
							<label for="categories">Categories:</label>
							<select name="categories" id="categories" class="form-control">
								@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach()
							</select>
						</div>

		            	<button type="submit" class="btn btn-primary">Add Item</button>
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
		</section>
	</section>  
</section>

@stop