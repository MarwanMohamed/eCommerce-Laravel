@extends('admin.templet.AdminLayout')
@section('content')
<section id="container" class="">
	<section id="main-content">
		<section class="wrapper">            
			<!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-tags"></i> categories</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ Url('/admin') }}">Home</a></li>
						<li><i class="fa fa-tags"></i>Categories</li>                          
					</ol>
				</div>
			</div>
				@if(Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
			<section class="panel">
				<header class="panel-heading">
					Categories
				</header>
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>visibility</th>
							<th>Ordring</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php  $id = 1;?>
						@foreach($categories as $category)
						<tr>
							<td>{{ $id++ }}</td>
							<td><a href="{{Url('admin/category/'.$category->id.'/ads')}}">{{ $category->name }}</a></td>
							<td>{{ $category->visibility == 1 ? 'Visible ' : 'Hiding' }}</td>
							<td>{{ $category->ordring }}</td>
							<td>
								<a href="categories/{{$category->id}}/edit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
								<a onclick="return confirm('Are you sure ?');" href="categories/{{$category->id}}/delete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
							</td>
						</tr>
						@endforeach()
					</tbody>
				</table>
				{{ $categories->links() }}

			</section>

		</section>
	</section>
</section>		

@stop