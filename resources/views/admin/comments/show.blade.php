@extends('admin.templet.AdminLayout')
@section('content')
<section id="container" class="">
	<section id="main-content">
		<section class="wrapper">            
			<!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-comments"></i> Comments</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ Url('/admin') }}">Home</a></li>
						<li><i class="fa fa-comments"></i>Comments</li>                          
					</ol>
				</div>
			</div>
				@if(Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
			<section class="panel">
				<header class="panel-heading">
					Comments
				</header>
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Comment</th>
							<th>Username</th>
							<th>Item</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php  $id = 1;?>
						@foreach($comments as $comment)
						<tr>
							<td>{{$id++}}</td>
							<td>{{$comment->comment}}</td>
							<td><a href="{{Url('admin/comments/'. $comment->user->id .'/edit')}}">{{$comment->user->name}}</a></td>
							<td><a href="{{Url('admin/comments/'.$comment->item->id.'/ads')}}">{{$comment->item->name}}</a></td>
							<td>
								<a href="comments/{{$comment->id}}/edit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
								<a onclick="return confirm('Are you sure ?');" href="comments/{{$comment->id}}/delete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
							</td>
						</tr>
						@endforeach()
					</tbody>
				</table>
				{{ $comments->links() }}

			</section>

		</section>
	</section>
</section>		

@stop