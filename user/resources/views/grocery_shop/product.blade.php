@extends('layout.master');
@section('content');

		<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner3">
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			</div>
			<div class="w3l_banner_nav_right_banner3_btm">
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/13.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Grocery Store</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Utensils</h4>
					<ol>
						<li>sunt in culpa qui officia</li>
						<li>commodo consequat</li>
						<li>sed do eiusmod tempor incididunt</li>
					</ol>
				</div>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/14.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Grocery Store</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Hair Care</h4>
					<ol>
						<li>enim ipsam voluptatem officia</li>
						<li>tempora incidunt ut labore et</li>
						<li>vel eum iure reprehenderit</li>
					</ol>
				</div>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/15.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Grocery Store</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Cookies</h4>
					<ol>
						<li>dolorem eum fugiat voluptas</li>
						<li>ut aliquid ex ea commodi</li>
						<li>magnam aliquam quaerat</li>
					</ol>
				</div>
				<div class="clearfix"> </div>
			</div>
<div class="w3ls_w3l_banner_nav_right_grid">
				<h3>{{$categories->category_name}}</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
                    <h6></h6>
                    @foreach ($products as $item)


					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" style="width: 250px, height= 180px">
										<div class="snipcart-thumb">
											<a href="{{ route('single.product', ['id'=>$item->id]) }}"><img src="{{$item->images}}" alt=" " class="img-responsive" /></a>
											<p>{{$item->title}}</p>
											<h4>{{$item->price}}<span>{{$item->offer}}</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="{{route('addToCat')}}" method="post" class="cart">
												@csrf
												<fieldset>
													<input type="hidden" name="id" value="{{$item->id}}" />
													<input type="hidden" name="quantity" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="title" value="{{$item->title}}" />
													<input type="hidden" name="price" value="{{$item->price}}" />
													<input type="hidden" name="offer" value="{{$item->offer}}" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>

											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
                    </div>
                    @endforeach
					<div class="clearfix"> </div>
				</div>

					<div class="clearfix"> </div>
				</div>
			</div>
		</div>

@endsection
