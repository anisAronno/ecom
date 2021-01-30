@extends('layout.master');
@section('content');
<div class="privacy about">
	<h3>Your Orders</h3>
	<div class="checkout-left">
		<div class="col-md-12 address_form_agile checkout-left-basket">
			  <h4>Your Orders</h4>
    <form action="" method="post" class="creditly-card-form agileinfo_form">
        <table class="table" border="1">
            <thead>
              <tr>
                <th scope="col" style="text-align: center"><h4>Invoice NO:</h4></th>
                <th scope="col" style="text-align: center"><h4>Product Name:</h4></th>
                <th scope="col" style="text-align: center"><h4>Product Amount</h4></th>
                <th scope="col" style="text-align: center"><h4>Product price</h4></th>
                <th scope="col" style="text-align: center"><h4>Total Price</h4></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($coutomer_orders as $order)
                <tr>
                    <th scope="row" style="text-align: center">{{$order->order_id}}</th>
                    <td style="text-align: center">{{$order->product_name}}</td>
                    <td style="text-align: center">{{$order->product_amount}} </td>
                    <td style="text-align: center">{{$order->unit_price}}</td>
                    <td style="text-align: center">{{$order->total_price}}</td>
                  </tr>
                @endforeach


            </tbody>
          </table>
		</form>
			</div>

		<div class="clearfix"> </div>

	</div>

</div>
@endsection
{{-- @push('myscript')
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
@endpush --}}
