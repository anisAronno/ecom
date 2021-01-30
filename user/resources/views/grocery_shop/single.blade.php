
@extends('layout.master');
@section('content');
<div class="banner">
		<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner3">
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			</div>
			<div class="agileinfo_single">
				<h5>{{$image->title}}</h5>
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="{{$image->images}}" alt=" " class="img-responsive" />
				</div>
				<div class="col-md-8 agileinfo_single_right">
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="w3agile_description">
						<h4>{{$image->description}} :</h4>
						<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
							officia deserunt mollit anim id est laborum.Duis aute irure dolor in
							reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
							pariatur.</p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4>{{$image->price}} <span>{{$image->offer}}</span></h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
                            <form action="{{route('addToCat')}}" method="post" class="cart">
                                @csrf
								<fieldset>
									<fieldset>
                                        <input type="hidden" name="id" value="{{$image->id}}" />
                                        <input type="hidden" name="quantity" value="1" />
                                        <input type="hidden" name="business" value=" " />
                                        <input type="hidden" name="title" value="{{$image->title}}" />
                                        <input type="hidden" name="price" value="{{$image->price}}" />
                                        <input type="hidden" name="offer" value="{{$image->offer}}" />
                                        <input type="hidden" name="currency_code" value="USD" />
                                        <input type="hidden" name="return" value=" " />
                                        <input type="hidden" name="cancel_return" value=" " />
                                        <input type="submit" name="submit" value="Add to cart" class="button" />
                                    </fieldset>
							</form>
                        </div>
                        <div class="snipcart-details agileinfo_single_right_details">
                            <form action="{{route('customerWishlist')}}" method="post" class="cart">
                                @csrf
								<fieldset>
									<fieldset>
                                        <input type="hidden" name="id" value="{{$image->id}}" />
                                        <input type="hidden" name="quantity" value="1" />
                                        <input type="hidden" name="business" value=" " />
                                        <input type="hidden" name="title" value="{{$image->title}}" />
                                        <input type="hidden" name="price" value="{{$image->price}}" />
                                        <input type="hidden" name="offer" value="{{$image->offer}}" />
                                        <input type="hidden" name="currency_code" value="USD" />
                                        <input type="hidden" name="return" value=" " />
                                        <input type="hidden" name="cancel_return" value=" " />
                                        <input type="submit" name="submit" value="Add to wishlist" class="button" />
                                    </fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- brands -->
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');
        }
    );
});
</script>

@endsection
