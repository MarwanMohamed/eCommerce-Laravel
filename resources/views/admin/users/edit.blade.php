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
						<li><i class="fa fa-edit"></i>Edit</li>                          
					</ol>
				</div>
			</div>

			<section class="panel">
				<header class="panel-heading">
					Edit User
				</header>
				<div class="panel-body">
					<form role='form' method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="{{ $user->id }}">
						
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" name="name" id='name' placeholder="Name" class="form-control" value="{{$user->name}}">
						</div>

						<div class="form-group">
							<label for="name">E-Mail Address:</label>
							<input type="email" name="email" id='email' placeholder="Email" class="form-control" value="{{$user->email}}">
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
							<label for="permission">Permission:</label>
                            <select name="permission" id="permission" class="form-control">
                            	<option value="0" {{$user->isAdmin == 0 ? 'selected' : ''}}>User</option>
                            	<option value="1" {{$user->isAdmin == 1 ? 'selected' : ''}}>Admin</option>
                            </select>
						</div>

		            	<div class="form-group">
		                 <label for="photo">Photo:</label><br>
		                 <img src="{{ asset('img/uploades/'. $user->photo ) }}" width="80" height="50""><br><br>
		                 <input type="file" id="photo" name="photo">
		            	</div>

		            	<button type="submit" class="btn btn-primary">Edit User</button>
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