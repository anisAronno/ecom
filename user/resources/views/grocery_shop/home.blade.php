@extends('layout.master');
@section('content');

 <div class="top-brands">
		<div class="container">
			<h3>Hot Offers</h3>
			<div class="agile_top_brands_grids">
                @php
                    $products=  App\Models\ProductModel::all();
                @endphp
                @foreach($products as $product)
                <div class="col-md-3 top_brand_left " style="width: 280px; height:280px">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="tag"><img src="{{asset('asset/images/offer.png')}}"  alt=" " class="img-responsive" /></div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb" style="width: 200px; height:200px; ">
											<a href="{{ route('single.product', ['id'=>$product->id]) }}"><img title=" " alt=" " src="{{$product->images}}" style="width: 200px; height:130px"/></a>
											<p>{{$product->description}}</p>
											<h4>{{$product->price}}<span>{{$product->offer}}</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="{{route('addToCat')}}" method="post" class="cart">
												@csrf
												<fieldset>
													<input type="hidden" name="id" value="{{$product->id}}" />
													<input type="hidden" name="quantity" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="title" value="{{$product->title}}" />
													<input type="hidden" name="price" value="{{$product->price}}" />
													<input type="hidden" name="offer" value="{{$product->offer}}" />
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

				{{-- <div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="tag"><img src="{{asset('asset/images/tag.png')}}" alt=" " class="img-responsive" /></div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
											<a href="{{url('single')}}"><img title=" " alt=" " src="{{asset('asset/images/1.png')}}" /></a>
											<p>fortune sunflower oil</p>
											<h4>$7.99 <span>$10.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="GET">
												@csrf
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
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
											<a href="{{url('single')}}"><img title=" " alt=" " src="{{asset('asset/images/3.png')}}" /></a>
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
								<img src="{{asset('asset/images/offer.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="{{url('single')}}"><img src="{{asset('asset/images/2.png')}}" alt=" " class="img-responsive" /></a>
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
								<img src="{{asset('asset/images/offer.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="{{url('single')}}"><img src="{{asset('asset/images/4.png')}}" alt=" " class="img-responsive" /></a>
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
<!-- //top-brands -->
<!-- fresh-vegetables -->
	<div class="fresh-vegetables">
		<div class="container">
			<h3>Top Products</h3>
			<div class="w3l_fresh_vegetables_grids">
				<div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
					<div class="w3l_fresh_vegetables_grid2">
						<ul>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="{{url('product')}}">All Brands</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="vegetables.html">Vegetables</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="{{url('product')}}">Fruits</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="{{url('drink')}}">Juices</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="{{url('pet')}}">Pet Food</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="{{url('bread')}}">Bread & Bakery</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="{{url('bread')}}">Cleaning</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="{{url('product')}}">Spices</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="{{url('product')}}">Dry Fruits</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="{{url('product')}}">Dairy Products</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-9 w3l_fresh_vegetables_grid_right">
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						<div class="w3l_fresh_vegetables_grid1">
							<img src="{{asset('asset/images/8.jpg')}}" alt=" " class="img-responsive" />
						</div>
					</div>
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						<div class="w3l_fresh_vegetables_grid1">
							<div class="w3l_fresh_vegetables_grid1_rel">
								<img src="{{asset('asset/images/7.jpg')}}" alt=" " class="img-responsive" />
								<div class="w3l_fresh_vegetables_grid1_rel_pos">
									<div class="more m1">
										<a href="{{url('product')}}" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
									</div>
								</div>
							</div>
						</div>
						<div class="w3l_fresh_vegetables_grid1_bottom">
							<img src="{{asset('asset/images/10.jpg')}}" alt=" " class="img-responsive" />
							<div class="w3l_fresh_vegetables_grid1_bottom_pos">
								<h5>Special Offers</h5>
							</div>
						</div>
					</div>
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						<div class="w3l_fresh_vegetables_grid1">
							<img src="{{asset('asset/images/9.jpg')}}" alt=" " class="img-responsive" />
						</div>
						<div class="w3l_fresh_vegetables_grid1_bottom">
							<img src="{{asset('asset/images/11.jpg')}}" alt=" " class="img-responsive" />
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="agileinfo_move_text">
						<div class="agileinfo_marquee">
							<h4>get <span class="blink_me">25% off</span> on first order and also get gift voucher</h4>
						</div>
						<div class="agileinfo_breaking_news">
							<span> </span>
						</div>
						<div class="clearfix"></div>
					</div>
				</div> --}}
				<div class="clearfix"> </div>
			</div>
		</div>
    </div>


@endsection
@push('myscript')
<script>
   $(".button").click(function(){
			$('.panel-disabled').show();
			var product_id=$(this).attr('id');
			var product_price=$(this).attr('price');
			var product_name=$(this).attr('title');
			var product_stock=$(this).attr('quantity');
			$.ajax({
					url: "{{url('add_to_cart')}}",
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					type: "POST",
					data: {
						product_id: id,
						product_price: price,
						product_name: title,
						product_stock: quantity,
					},
					success: function(data) {
						if (data.success==true) {
							$.notify("Product Added To Cart","success");
						}else if(data.success==false){
							$.notify("Sorry,Try Again","danger");
						}
					}
				});
		})
</script>
@endpush

