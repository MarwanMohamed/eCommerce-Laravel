@extends('admin.templet.AdminLayout')
@section('content')
<section id="container" class="">
	<section id="main-content">
		<section class="wrapper">            
			<!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-shopping-cart"></i> Ads</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ Url('/admin') }}">Home</a></li>
						<li><i class="fa fa-tags"></i><a href="{{ Url('/admin/categories') }}">Categories</a></li>
						<li>{{$category->name}}</li>                          
					</ol>
				</div>
			</div>
				@if(Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
			<section class="panel">
				@if($ads->isEmpty())
				<div class="text-center alert alert-info">No Ads in this Category Right Now</div>
				@else()
				<header class="panel-heading">
					Ads
				</header>
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Username</th>
							<th>Category</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php  $id = 1;?>
						@foreach($ads as $ad)
						<tr>
							<td>{{$id++}}</td>
							<td>{{$ad->name}}</td>
							<td>{{$ad->description}}</td>
							<td>{{$ad->price}}</td>
							<td><a href="{{Url('admin/users/'. $ad->user->id .'/edit')}}">{{$ad->user->name}}</a></td>
							<td><a href="{{Url('admin/category/'. $ad->category->name .'/ads')}}">{{$ad->category->name}}</a></td>
							<td>
							<a href="../../items/{{$ad->id}}/edit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
								<a onclick="return confirm('Are you sure ?');" href="../../items/{{$ad->id}}/delete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
								@if($ad->approve == 0)
								<a href="../../items/{{$ad->id}}/active" class="btn btn-info"><i class="fa fa-check"></i> Activate</a>
								@endif()
							</td>
						</tr>
						@endforeach()
					</tbody>
				</table>
				@endif()
				{{ $ads->links() }}
			</section>

		</section>
	</section>
</section>		

@stop