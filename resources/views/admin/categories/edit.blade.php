@extends('admin.templet.AdminLayout')

@section('content')

<section id="container" class="">
	<section id="main-content">
		<section class="wrapper">            
			<!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-users"></i> Categories</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="/admin">Home</a></li>
						<li><i class="fa fa-tags"></i><a href="/admin/categories">Categories</a></li>
						<li><i class="fa fa-edit"></i>Edit</li>                          
					</ol>
				</div>
			</div>

			<section class="panel">
				<header class="panel-heading">
					Edit Category
				</header>
				<div class="panel-body">
				{!! Form::model($category, ['route'=> ['admin/categories/update', $category->id],'method'=>'PATCH']) !!}
					@include('admin.categories.form')
				{!! Form::close() !!}	
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