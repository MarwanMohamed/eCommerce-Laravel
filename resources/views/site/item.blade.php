@extends('site.layout')
@section('content')

<div class="single">
	<div class="container">
		<div class="col-md-9">
			<div class="col-md-5 grid">		
				<div class="flexslider">
					<ul class="slides">
						@foreach(explode(' | ', $item->photos) as $photo )
						<li data-thumb="{{asset('img/uploades/'.$photo)}}">
							<div class="thumb-image"> <img src="{{asset('img/uploades/'.$photo)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						@endforeach()
					</ul>
				</div>
			</div>	
			<div class="col-md-7 single-top-in">
				<div class="span_2_of_a1 simpleCart_shelfItem">
					<h3>{{$item->name}}</h3>
					<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
					<div class="price_single">
						<span class="reducedfrom item_price">${{$item->price}}</span>
						<div class="clearfix"></div>
					</div>
					<h4 class="quick">Quick Overview:</h4>
					<p class="quick_desc">{{$item->description}}</p>
					
					
					<div class="clearfix"> </div>
				</div>
			<hr>
				<div class="form-group col-md-15">
					<form method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">	
						<input type="hidden" name="item_id" value="{{$item->id}}">	
						<label for="comment">Comment:</label>
						<textarea name="comment" id='comment'  class="form-control">{{old('comment')}}</textarea><br>
						<input type="submit" name="submit" value="Add Comment" class="btn btn-primary">
					</form>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
			<div class="clearfix"> </div>
			<hr>
			@foreach($comments as $comment)
				<div class="comment-box">
					<div class="row">
						<div class="col-md-4 text-center">
							<img class="img-responsive img-thumbnail img-circle center-block" src="{{asset('img/uploades/'.$comment->user->photo)}}" alt="" />
							{{$comment->user->name}}
						</div>
						<div class="col-md-8">
							<p class="lead">{{$comment->comment}}</p>
						</div>
					</div>
				</div>
				<hr class="custom-hr">
			@endforeach

	</div>
</div>



@stop()