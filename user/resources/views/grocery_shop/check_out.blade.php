@extends('layout.master');
@section('content');
<div class="privacy about">
	<h3>Chec<span>kout</span></h3>

  <div class="checkout-right">

            <h4>Your shopping cart contains: <span>{{ Cart::getTotalQuantity() }} Products</span></h4>
            @php $cartItems=Cart::getContent(); @endphp
		<table class="timetable_sub" id="result">
			<thead>
				<tr>
					<th>SL No.</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
					<th>Quentity</th>
					<th>Price</th>
					<th>Remove</th>
				</tr>
			</thead>
			<tbody id="cart-items">
                @foreach($cartItems as $item)
                <tr class="rem1" id="totalPrice">
				<td class="invert">{{$item->id}}</td>
				<td class="invert-image"><a href="{{url('single')}}"><img src="{{asset('asset/images/1.png')}}" alt=" " class="img-responsive"></a></td>
                <td class="invert">{{$item->name}}</td>
                <td class="invert">
                    <div class="quantity">
                       <div class="quantity-select">
                           <div class="entry value-minus" onclick="minusFunc({{$item->id}},{{$item->price}})"> <a href="#">&nbsp;</a></div>
                           <div class="entry value"><span id='qty_{{$item->id}}'>{{$item->quantity}}</span></div>
                           <div class="entry value-plus active" onclick="plusFunc({{$item->id}},{{$item->price}})">&nbsp;</div>
                       </div>
                   </div>
               </td>

				<td class="invert" id="unit_price_{{$item->id}}">{{$item->price*$item->quantity}}</td>
				<td class="invert">
					<div class="rem">
						<a href="{{url('remove_form_cart',['id'=>$item->id])}}"><div class="close1 " > </div></a>
					</div>

				</td>
            </tr>
            @endforeach
        </tbody>
    </table>
	</div>
	<div class="checkout-left">
		<div class="col-md-4 checkout-left-basket">
            <h4>Continue to basket</h4>
            {{-- @php $cartItems=Cart::getContent(); @endphp --}}
			<ul>
                {{-- @foreach($cartItems as $item) --}}
                {{-- <script type="text/javascript">
                    document.getElementById("result").innerHTML = localStorage.getItem("cart");

                </script> --}}
				<input type="hidden" name="item_name" value=""
				<li>Total Product Items<i>-</i> <button class="btn btn-primary"><span>{{ Cart::getTotalQuantity() }} </span></button></li>
				<li style="text-color:black,font-size:16px; margin:20px 0px 0px">Total Product Cost: <i>-</i> <span>{{ Cart::getTotal() }}</span></li>
                <li>Total Service Charges <i>-</i> <span>BDT30.00</span></li>

                <li>Total <i>-</i> <span>{{ Cart::getTotal()+30 }}</span></li>
                {{-- @endforeach --}}
			</ul>
		</div>
		<div class="col-md-8 address_form_agile">
			  <h4>Add a new Details</h4>
    {{-- <form action="{{url('order_insert')}}" method="post" class="creditly-card-form agileinfo_form">
        @csrf
				<section class="creditly-wrapper wthree, w3_agileits_wrapper">
					<div class="information-wrapper">
						<div class="first-row form-group">
							<div class="controls">
								<label class="control-label">Full name: </label>
                                <input class="billing-address-name form-control" type="text" name="name" placeholder="Enter Your Name" value="{{session('data')[0]->name}}">
                                <div class='controls'> @error('name') {{$message}} @enderror </div>
							</div>
							<div class="w3_agileits_card_number_grids">
								<div class="w3_agileits_card_number_grid_left">
									<div class="controls">
										<label class="control-label">Mobile number:</label>
                                        <input class="form-control" type="text" name="con" placeholder="Mobile number" value="{{session('data')[0]->phone}}">
                                        <div class='controls'> @error('con') {{$message}} @enderror </div>
									</div>
								</div>
								<div class="w3_agileits_card_number_grid_left">
									<div class="controls">
										<label class="control-label">Shipping Address:</label>
                                        <input class="form-control" type="text" name="addr" placeholder="Shipping Address" value="{{session('data')[0]->addr}}">
                                        <div class='controls'> @error('con') {{$message}} @enderror </div>
									</div>
								</div>
						</div>
						<button  type="submit" class="submit check_out">Delivery to this Address</button>
					</div>
				</section>
		</form> --}}
							<div class="checkout-right-basket">
		        	<a href="{{url('payment')}}">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
	      	</div>
			</div>

		<div class="clearfix"> </div>

	</div>

</div>
@endsection
@push('myscript')
<script>
    function minusFunc(id,singleprice){
        //alert(singleprice);return;
        let qty= $("#qty_"+id).html();
        let unitprice= $("#unit_price_"+id).html();
        //alert(unitprice);return;
        //alert(Number(unitprice)-Number(singleprice));return;
        if(qty<1){
            alert('There is No Item');return;
        }
        $("#qty_"+id).html(qty-1);
        $("#unit_price_"+id).html(Number(unitprice)-Number(singleprice))
    }

    function plusFunc(id,singleprice){
        //alert(singleprice);return;
        let qty= $("#qty_"+id).html();
        let unitprice= $("#unit_price_"+id).html();
        //alert(unitprice);return;
        //alert(Number(unitprice)-Number(singleprice));return;
        $("#qty_"+id).html(Number(qty)+1);
        $("#unit_price_"+id).html(Number(unitprice)+Number(singleprice))
    }
    $(document).on("click",".removeProduct",function(){
        //alert();
			var button=$(this)
			var productId=$(this).attr('pro_id');
            //alert(productId);
			$.ajax({
					url: "{{url('remove_form_cart')}}",
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					type: "POST",
					data: {
						productId: productId,
					},
					success: function(data) {
						if (data.success==true) {
							button.closest('tr').remove();
							$("#totalPrice strong").html(data.total)
							if($("#cart-items tr").length<1){
								$("#cartUpdateButton").attr('disabled',true);
							}
							$.notify("Product Remove From cart","success");
						}
					}
				});
		})
// $(document).ready(function(){
//     alert();
// });
</script>
@endpush
