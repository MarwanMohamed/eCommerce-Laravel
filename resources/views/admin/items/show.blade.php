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
						<li><i class="fa fa-home"></i><a href="{{ Url('/admin') }}">Home</a></li>
						<li><i class="fa fa-shopping-cart"></i>Items</li>                          
					</ol>
				</div>
			</div>
				@if(Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
			<section class="panel">
				<header class="panel-heading">
					Items
				</header>
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Photos</th>
							<th>Username</th>
							<th>Category</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php  $id = 1;?>
						@foreach($items as $item)
						<tr>
							<td>{{$id++}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->description}}</td>
							<td>{{$item->price}}</td>
							<td>
								@if($item->photos != "")
									@foreach(explode(' | ', $item->photos) as $photo )
									<img src="{{asset('img/uploades/'. $photo )}}" width="80" height="80"> 
									@endforeach()
								@endif()
							</td>
							<td><a href="{{Url('admin/users/'. $item->user->id .'/edit')}}">{{$item->user->name}}</a></td>
							<td><a href="{{Url('admin/category/'.$item->category->id.'/ads')}}">{{$item->category->name}}</a></td>
							<td>
								<a href="items/{{$item->id}}/edit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
								<a onclick="return confirm('Are you sure ?');" href="items/{{$item->id}}/delete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
								@if($item->approve == 0)
								<a href="items/{{$item->id}}/active" class="btn btn-info"><i class="fa fa-check"></i> Activate</a>
								@endif()
							</td>
						</tr>
						@endforeach()
					</tbody>
				</table>
				{{ $items->links() }}

			</section>

		</section>
	</section>
</section>		

@stop