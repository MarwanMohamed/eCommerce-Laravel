@extends('admin.templet.AdminLayout')
@section('content')
<section id="container" class="">
	<section id="main-content">
		<section class="wrapper">            
			<!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-users"></i> users</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ Url('/admin') }}">Home</a></li>
						<li><i class="fa fa-users"></i>Users</li>                          
					</ol>
				</div>
			</div>
				@if(Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
			<section class="panel">
				<header class="panel-heading">
					Users
				</header>
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Photo</th>
							<th>Ads</th>
							<th>Permission</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php  $id = 1;?>
						@foreach($users as $user)
						<tr>
							<td>{{ $id++ }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td><img src="{{ asset('img/uploades/'. $user->photo ) }}" width="80" height="50"></td>
							<td><a href="{{ Url('/admin/users/'.$user->id.'/ads') }}">{{ itemsUser($user->id) }}</a></td>
							<td style="{{ $user->isAdmin == 1 ? 'color:red' : '' }}">
								{{ $user->isAdmin == 0 ? 'User' : 'Admin'}}
							</td>
							<td>
								<a href="users/{{$user->id}}/edit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
								<a onclick="return confirm('Are you sure ?');" href="users/{{$user->id}}/delete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
								@if($user->active == 0)
								<a href="users/{{$user->id}}/active" class="btn btn-info"><i class="fa fa-check"></i> Activate</a>
								@endif()
							</td>
						</tr>
						@endforeach()
					</tbody>
				</table>
						{!! $users->links() !!}
			</section>

		</section>
	</section>
</section>		

@stop