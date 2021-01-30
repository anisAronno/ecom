	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="{{url('product')}}">Today's special Offers !</a>
		</div>
		<div class="w3l_search">
			<form action="" method="post">
				<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
		<div class="product_list_header">
            <form action="{{url('check_out')}}" method="GET" class="last">
                @csrf
                {{-- <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />

                </fieldset> --}}
                <input type="submit" name="submit" value="View your cart" class="button" />
            </form>
		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="{{url('login')}}">Login</a></li>
								<li><a href="{{url('login')}}">Sign Up</a></li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="{{url('mail')}}">Contact Us</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop();
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });

	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="{{url('home')}}"><span>Grocery</span> Store</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li class="#">
                        <li><a href="{{url('about')}}">About</a></li>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
                                    {{-- @php
                                      $category=  App\Models\CategoryModel::all();
                                    @endphp --}}
									<ul>
										{{-- @foreach($category as $cat)
										<li><a href="{{ route('category.product', ['id'=>$cat->id]) }}"><h5>{{$cat->category_name}}</h5></a></li>
                                        @endforeach --}}
                                        <li><a href="{{url('about')}}">About</a></li>

									</ul>
								</div>
							</div>
						</li>
                    </li>
                    {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><button>Brand</button><span class="caret"></span></a>
                        <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                            <div class="w3ls_vegetables">
                                <ul>
                                    @php
                                      $brand=  App\Models\BrandModel::all();
                                    @endphp
                                    @foreach($brand as $br)
                                    <li><a href="{{url('drinks')}}"><h5>{{$br->brand_name}}</h5></a></li><br/>
                                    @endforeach

                                </ul>
                            </div>
                        </div> --}}
                    </li>
					{{-- <li><a href="{{url('about')}}">About Us</a><i>/</i></li> --}}
					<li><a href="{{url('product')}}">Best Deals</a><i>/</i></li>
					<li><a href="{{url('service')}}">Services</a></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
