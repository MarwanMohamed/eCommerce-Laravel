@extends('site.layout')
@section('content')

<!--banner-->
<div class="banner">
	<div class="container">
		<section class="rw-wrapper">
			<h1 class="rw-sentence">
				<span>Fashion &amp; Beauty</span>
				<div class="rw-words rw-words-1">
					<span>Beautiful Designs</span>
					<span>Sed ut perspiciatis</span>
					<span> Totam rem aperiam</span>
					<span>Nemo enim ipsam</span>
					<span>Temporibus autem</span>
					<span>intelligent systems</span>
				</div>
				<div class="rw-words rw-words-2">
					<span>We denounce with right</span>
					<span>But in certain circum</span>
					<span>Sed ut perspiciatis unde</span>
					<span>There are many variation</span>
					<span>The generated Lorem Ipsum</span>
					<span>Excepteur sint occaecat</span>
				</div>
			</h1>
		</section>
	</div>
</div>
<!--content-->
<div class="content">
	<div class="container">
		
		<div class="content-mid">
			<h3>Trending Items</h3>
			<label class="line"></label>
			<div class="mid-popular">			
				@foreach($items->chunk(4) as $set)
					<div class="mid-popular">
						@foreach($set as $item)
						<div class="col-md-3 item-grid simpleCart_shelfItem">
							<div class=" mid-pop">
								<div class="pro-img">
									@php $photo = explode('|', $item->photos); @endphp								
									<img src="{{asset('img/uploades/'.$photo[0])}}" class="img-responsive" alt="">

									<div class="zoom-icon ">
										<a class="picture" href="{{asset('img/uploades/'.$photo[0])}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
										<a href="{{Url('/item/'.$item->id)}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
									</div>
								</div>
								<div class="mid-1">
									<div class="women">
										<div class="women-top">
											<span>{{$item->category->name}}</span>
											<h6><a href="{{Url('/item/'.$item->id)}}">{{$item->name}}</a></h6>
										</div>
										<div class="img item_add">
											<a href="#"><img src="{{asset('site/images/ca.png')}}" alt=""></a>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="mid-2">
										<p ><em class="item_price">${{$item->price}}</em></p>
										<div class="block">
											<div class="starbox small ghosting"> </div>
										</div>

										<div class="clearfix"></div>
									</div>

								</div>
							</div>
						</div>
						@endforeach()
					</div>
					<div class="clearfix"></div>
				@endforeach()
				{{$items->links()}}
			
		</div>
		<!--//products-->
	</div>

</div>
<!--//content-->

@stop()