


@extends('layout.master');
@section('content');


	<div class="w3l_banner_nav_right">
		<div class="w3l_banner_nav_right_banner6">
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
					<img src="images/20.jpg" alt=" " class="img-responsive">
					<div class="mask">
						<h4>Grocery Store</h4>
						<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
					</div>
				</div>
				<h4>Vegetables</h4>
				<ol>
					<li>dolorem eum fugiat voluptas</li>
					<li>ut aliquid ex ea commodi</li>
					<li>magnam aliquam quaerat</li>
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
			<div class="w3ls_w3l_banner_nav_right_grid_head">
				<h6>Popular Categories</h6>
			</div>
			<div class="w3ls_w3l_banner_nav_right_grid_head_grids">
				<div class="col-md-4 w3ls_w3l_banner_nav_right_grid_head_grid">
					<img src="images/22.jpg" alt=" " class="img-responsive" />
					<h4>Bread & Bakery</h4>
					<ul>
						<li><a href="{{url('bread')}}">Raising rolls</a></li>
						<li><a href="{{url('bread')}}">Butter Croissants</a></li>
						<li><a href="{{url('bread')}}">wheat pita</a></li>
						<li><a href="{{url('bread')}}">Hot dog roll</a></li>
					</ul>
				</div>
				<div class="col-md-4 w3ls_w3l_banner_nav_right_grid_head_grid">
					<img src="images/23.jpg" alt=" " class="img-responsive" />
					<h4>Beverages</h4>
					<ul>
						<li><a href="{{url('drink')}}">Juices</a></li>
						<li><a href="{{url('drink')}}">Soft Drinks</a></li>
						<li><a href="{{url('drink')}}">Energy Drinks</a></li>
					</ul>
				</div>
				<div class="col-md-4 w3ls_w3l_banner_nav_right_grid_head_grid">
					<img src="images/24.jpg" alt=" " class="img-responsive" />
					<h4>Frozen Foods</h4>
					<ul>
						<li><a href="{{url('frozen')}}">Frozen Snacks</a></li>
						<li><a href="{{url('frozen')}}">Frozen Nonveg</a></li>
						<li><a href="{{url('frozen')}}">Frozen Sweet Corn</a></li>
						<li><a href="{{url('frozen')}}">Frozen Mixed Vegetable</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<!-- //banner -->
<!-- top-brands -->
<div class="top-brands">
	<div class="container">
		<h3>Popular Products</h3>
		<div class="agile_top_brands_grids">
			<div class="col-md-3 top_brand_left">
				<div class="hover14 column">
					<div class="agile_top_brand_left_grid">
						<div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
						<div class="agile_top_brand_left_grid1">
							<figure>
								<div class="snipcart-item block" >
									<div class="snipcart-thumb">
										<a href="{{url('single')}}"><img title=" " alt=" " src="images/1.png" /></a>		
										<p>fortune sunflower oil</p>
										<h4>$7.99 <span>$10.00</span></h4>
									</div>
									<div class="snipcart-details top_brand_home_details">
										<form action="#" method="post">
											<fieldset>
												<input type="hidden" name="cmd" value="_cart" />
												<input type="hidden" name="add" value="1" />
												<input type="hidden" name="business" value=" " />
												<input type="hidden" name="item_name" value="fortune sunflower oil" />
												<input type="hidden" name="amount" value="7.99" />
												<input type="hidden" name="discount_amount" value="1.00" />
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
			<div class="col-md-3 top_brand_left">
				<div class="hover14 column">
					<div class="agile_top_brand_left_grid">
						<div class="agile_top_brand_left_grid1">
							<figure>
								<div class="snipcart-item block" >
									<div class="snipcart-thumb">
										<a href="{{url('single')}}"><img title=" " alt=" " src="images/3.png" /></a>		
										<p>basmati rise (5 Kg)</p>
										<h4>$11.99 <span>$15.00</span></h4>
									</div>
									<div class="snipcart-details top_brand_home_details">
										<form action="#" method="post">
											<fieldset>
												<input type="hidden" name="cmd" value="_cart" />
												<input type="hidden" name="add" value="1" />
												<input type="hidden" name="business" value=" " />
												<input type="hidden" name="item_name" value="basmati rise" />
												<input type="hidden" name="amount" value="11.99" />
												<input type="hidden" name="discount_amount" value="1.00" />
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
			<div class="col-md-3 top_brand_left">
				<div class="hover14 column">
					<div class="agile_top_brand_left_grid">
						<div class="agile_top_brand_left_grid_pos">
							<img src="images/offer.png" alt=" " class="img-responsive" />
						</div>
						<div class="agile_top_brand_left_grid1">
							<figure>
								<div class="snipcart-item block">
									<div class="snipcart-thumb">
										<a href="{{url('single')}}"><img src="images/2.png" alt=" " class="img-responsive" /></a>
										<p>Pepsi soft drink (2 Ltr)</p>
										<h4>$8.00 <span>$10.00</span></h4>
									</div>
									<div class="snipcart-details top_brand_home_details">
										<form action="#" method="post">
											<fieldset>
												<input type="hidden" name="cmd" value="_cart" />
												<input type="hidden" name="add" value="1" />
												<input type="hidden" name="business" value=" " />
												<input type="hidden" name="item_name" value="Pepsi soft drink" />
												<input type="hidden" name="amount" value="8.00" />
												<input type="hidden" name="discount_amount" value="1.00" />
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
			<div class="col-md-3 top_brand_left">
				<div class="hover14 column">
					<div class="agile_top_brand_left_grid">
						<div class="agile_top_brand_left_grid_pos">
							<img src="images/offer.png" alt=" " class="img-responsive" />
						</div>
						<div class="agile_top_brand_left_grid1">
							<figure>
								<div class="snipcart-item block">
									<div class="snipcart-thumb">
										<a href="{{url('single')}}"><img src="images/4.png" alt=" " class="img-responsive" /></a>
										<p>dogs food (4 Kg)</p>
										<h4>$9.00 <span>$11.00</span></h4>
									</div>
									<div class="snipcart-details top_brand_home_details">
										<form action="#" method="post">
											<fieldset>
												<input type="hidden" name="cmd" value="_cart" />
												<input type="hidden" name="add" value="1" />
												<input type="hidden" name="business" value=" " />
												<input type="hidden" name="item_name" value="dogs food" />
												<input type="hidden" name="amount" value="9.00" />
												<input type="hidden" name="discount_amount" value="1.00" />
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
			<div class="clearfix"> </div>
		</div>
	</div>
</div>

@endsection