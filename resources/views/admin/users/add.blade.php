@extends('admin.templet.AdminLayout')

@section('content')

<section id="container" class="">
	<section id="main-content">
		<section class="wrapper">            
			<!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-users"></i> Users</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="/admin">Home</a></li>
						<li><i class="fa fa-users"></i><a href="/admin/users">Users</a></li>                          
						<li><i class="fa fa-plus"></i>Add</li>                          
					</ol>
				</div>
			</div>
			

			<section class="panel">
				<header class="panel-heading">
					Add User
				</header>
				<div class="panel-body">
					<form role='form' method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" name="name" id='name'  class="form-control" value="{{ old('name') }}">
						</div>

						<div class="form-group">
							<label for="name">E-Mail Address:</label>
							<input type="email" name="email" id='email'  class="form-control" value="{{old('email')}}">
						</div>

						<div class="form-group">
							<label for="password">Password:</label>
                            <input id="password" type="password" class="form-control" name="password">
						</div>
						<div class="form-group">
							<label for="password-confirm">Confirm Password:</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
						</div>

		            	<div class="form-group">
		                 <label for="photo">Photo:</label><br>
		                 <input type="file" id="photo" name="photo">
		            	</div>

		            	<button type="submit" class="btn btn-primary">Add User</button>
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