<!--header-->
<div class="header">
	<div class="container">
		<div class="head">
			<div class=" logo">
				<a href="{{Url('/')}}"><img src="{{asset('site/images/logo.png')}}" alt=""></a>	
			</div>
		</div>
	</div>
	<div class="header-top">
		<div class="container">
			<div class="col-sm-5 col-md-offset-2  header-login">
				<ul >
					@if(Auth::check())
					<li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="{{ asset('img/uploades/thumb/'. Auth::user()->thum_photo) }}">
                            </span>
                            <span class="username">{{ Auth::user()->name }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout" style="background-color: #2E2E2E">
                            <div class="log-arrow-up"></div>
                            <li>
                                <a href="{{Url('/advertising')}}"><i class="icon_clock_alt"></i> My Advertising</a>
                            </li>
                            <li class="eborder-top">
                                <a href="{{Url('/user/'. Auth::user()->id .'/edit')}}"><i class="icon_profile"></i>Settings</a>
                            </li>
                         
                            <li>
                                <a href="{{Url('logout')}}"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            
                        </ul>
                    </li>

					<li><a href="{{Url('/adding')}}"> + Place a Free Ad</a></li>
					@else()
					<li><a href="{{Url('/login')}}">Login</a></li>
					<li><a href="{{Url('/register')}}">Register</a></li>
					@endif
				</ul>
			</div>

			<div class="col-sm-5 header-social">		
				<ul >
					<li><a href="#"><i class="ic1"></i></a></li>
					<li><a href="#"><i></i></a></li>
					<li><a href="#"><i class="ic3"></i></a></li>
				</ul>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="container">
		
		<div class="head-top">
			
			<div class="col-sm-8 col-md-offset-2 h_menu4">
				<nav class="navbar nav_bottom" role="navigation">

					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

					</div> 
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav nav_1">
							<li><a class="color" href="index.html">Home</a></li>

							<li class="dropdown mega-dropdown active">
								<a class="color1" href="#" class="dropdown-toggle" data-toggle="dropdown">Women<span class="caret"></span></a>				
								<div class="dropdown-menu ">
									<div class="menu-top">
										<div class="col1">
											<div class="h_nav">
												<h4>Submenu1</h4>
												<ul>
													<li><a href="product.html">Accessories</a></li>
													<li><a href="product.html">Bags</a></li>
													<li><a href="product.html">Caps & Hats</a></li>
													<li><a href="product.html">Hoodies & Sweatshirts</a></li>

												</ul>	
											</div>							
										</div>
										<div class="col1">
											<div class="h_nav">
												<h4>Submenu2</h4>
												<ul>
													<li><a href="product.html">Jackets & Coats</a></li>
													<li><a href="product.html">Jeans</a></li>
													<li><a href="product.html">Jewellery</a></li>
													<li><a href="product.html">Jumpers & Cardigans</a></li>
													<li><a href="product.html">Leather Jackets</a></li>
													<li><a href="product.html">Long Sleeve T-Shirts</a></li>
												</ul>	
											</div>							
										</div>
										<div class="col1">
											<div class="h_nav">
												<h4>Submenu3</h4>
												<ul>
													<li><a href="product.html">Shirts</a></li>
													<li><a href="product.html">Shoes, Boots & Trainers</a></li>
													<li><a href="product.html">Sunglasses</a></li>
													<li><a href="product.html">Sweatpants</a></li>
													<li><a href="product.html">Swimwear</a></li>
													<li><a href="product.html">Trousers & Chinos</a></li>

												</ul>	

											</div>							
										</div>
										<div class="col1">
											<div class="h_nav">
												<h4>Submenu4</h4>
												<ul>
													<li><a href="product.html">T-Shirts</a></li>
													<li><a href="product.html">Underwear & Socks</a></li>
													<li><a href="product.html">Vests</a></li>
													<li><a href="product.html">Jackets & Coats</a></li>
													<li><a href="product.html">Jeans</a></li>
													<li><a href="product.html">Jewellery</a></li>
												</ul>	
											</div>							
										</div>
										<div class="col1 col5">
											<img src="{{asset('site/images/me.png')}}" class="img-responsive" alt="">
										</div>
										<div class="clearfix"></div>
									</div>                  
								</div>				
							</li>
							<li class="dropdown mega-dropdown active">
								<a class="color2" href="#" class="dropdown-toggle" data-toggle="dropdown">Men<span class="caret"></span></a>				
								<div class="dropdown-menu mega-dropdown-menu">
									<div class="menu-top">
										<div class="col1">
											<div class="h_nav">
												<h4>Submenu1</h4>
												<ul>
													<li><a href="product.html">Accessories</a></li>
													<li><a href="product.html">Bags</a></li>
													<li><a href="product.html">Caps & Hats</a></li>
													<li><a href="product.html">Hoodies & Sweatshirts</a></li>

												</ul>	
											</div>							
										</div>
										<div class="col1">
											<div class="h_nav">
												<h4>Submenu2</h4>
												<ul>
													<li><a href="product.html">Jackets & Coats</a></li>
													<li><a href="product.html">Jeans</a></li>
													<li><a href="product.html">Jewellery</a></li>
													<li><a href="product.html">Jumpers & Cardigans</a></li>
													<li><a href="product.html">Leather Jackets</a></li>
													<li><a href="product.html">Long Sleeve T-Shirts</a></li>
												</ul>	
											</div>							
										</div>
										<div class="col1">
											<div class="h_nav">
												<h4>Submenu3</h4>

												<ul>
													<li><a href="product.html">Shirts</a></li>
													<li><a href="product.html">Shoes, Boots & Trainers</a></li>
													<li><a href="product.html">Sunglasses</a></li>
													<li><a href="product.html">Sweatpants</a></li>
													<li><a href="product.html">Swimwear</a></li>
													<li><a href="product.html">Trousers & Chinos</a></li>

												</ul>	

											</div>							
										</div>
										<div class="col1">
											<div class="h_nav">
												<h4>Submenu4</h4>
												<ul>
													<li><a href="product.html">T-Shirts</a></li>
													<li><a href="product.html">Underwear & Socks</a></li>
													<li><a href="product.html">Vests</a></li>
													<li><a href="product.html">Jackets & Coats</a></li>
													<li><a href="product.html">Jeans</a></li>
													<li><a href="product.html">Jewellery</a></li>
												</ul>	
											</div>							
										</div>
										<div class="col1 col5">
											<img src="{{asset('site/images/me1.png')}}" class="img-responsive" alt="">
										</div>
										<div class="clearfix"></div>
									</div>                  
								</div>				
							</li>
							<li><a class="color3" href="product.html">Sale</a></li>
							<li><a class="color4" href="404.html">About</a></li>
							<li><a class="color5" href="typo.html">Short Codes</a></li>
							<li ><a class="color6" href="contact.html">Contact</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->

				</nav>
			</div>
			<div class="col-sm-2 search-right">
				<a href="{{Url('/adding')}}" class="btn" style="background-color: #f67777; color: #fff"> + Place a Free Ad</a>
			</div>
			<div class="clearfix"></div>
		</div>	
	</div>	
</div>