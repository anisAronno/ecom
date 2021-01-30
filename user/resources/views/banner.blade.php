	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
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

                        @php
                        $category=  App\Models\CategoryModel::all();
                      @endphp
						<li>
                            <a href="#">Product Categories</a>
                            <ul class="nav navbar-nav nav_1">
                                @foreach($category as $cat)
                                <li><a href="{{ route('category.product', ['id'=>$cat->id]) }}"><h5>{{$cat->category_name}}</h5></a></li>
                                @endforeach

                            </ul>
							{{-- <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
                                        @php
                                      $category=  App\Models\CategoryModel::all();
                                    @endphp
                                     @foreach($category as $cat)
                                     <li><a href="{{url('drinks')}}"><h5>{{$cat->category_name}}</h5></a></li><br/>
                                     @endforeach
									</ul>
								</div> --}}
							</div>
                        </li>
{{--
						<li><a href="{{url('kitchen')}}">Kitchen</a></li>
						<li><a href="#">Short Codes</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										<li><a href="{{url('drink')}}">Soft Drinks</a></li>
										<li><a href="{{url('drink')}}">Juices</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li><a href="{{url('pet')}}">Pet Food</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Frozen Foods<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										<li><a href="{{url('frozen')}}">Frozen Snacks</a></li>
										<li><a href="{{url('frozen')}}">Frozen Nonveg</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li><a href="{{url('bread')}}">Bread & Bakery</a></li> --}}
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<section class="slider">
                @php
                    $sliders=  App\Models\SliderModel::all();
                @endphp
				<div class="flexslider">
					<ul class="slides">
                        @foreach ($sliders as $slider)
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3>Make your <span>food</span> with Spicy.{{$slider->title}}</h3>
								<div class="more">
                                    <h3>{{$slider->sub_title}}</h3>
									<a href="{{url('product')}}" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
                        </li>
                        @endforeach
						{{-- <li>
							<div class="w3l_banner_nav_right_banner1">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="{{url('product')}}" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3>upto <i>50%</i> off.</h3>
								<div class="more">
									<a href="{{url('product')}}" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li> --}}
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="{{asset('asset/css/flexslider.css')}}" type="text/css" media="screen" property="" />
				<script defer src="{{asset('asset/js/jquery.flexslider.js')}}"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>
