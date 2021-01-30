@extends('layout.master');
@section('content');
<div class="privacy about">
	<h3>Your<span>Profile</span></h3>
	<div class="checkout-left">
		<div class="col-md-6 checkout-left-basket">
            <h4>Your Personal Information</h4>
            {{-- @php $cartItems=Cart::getContent(); @endphp --}}
			<ul>
                {{-- @foreach($cartItems as $item) --}}
                {{-- <script type="text/javascript">
                    document.getElementById("result").innerHTML = localStorage.getItem("cart");

                </script> --}}
				<input type="hidden" name="item_name" value=""
				<li><img src="" alt="" style="margin-left:200px; width:250px; height:250px"></li>
				<table class="" border="1">
					<thead>
						<tr style="text-align: center">

                            <th style="text-align: center">Your Name</th>
                            <td class="invert-image" width=80%>{{session('data')[0]->name}}</td>
                        </tr>
                        <tr style="text-align: center">
                            <th style="text-align: center">Contact No</th>
                            <td class="invert">{{session('data')[0]->phone}}</td>
                        </tr>
                        <tr style="text-align: center">
                            <th style="text-align: center">Email</th>
                            <td class="invert">{{session('data')[0]->email}}</td>
                        </tr>
                         <tr style="text-align: center">
                            <th style="text-align: center">Home Address</th>
                            <td class="invert">Dawder Khara,Chapapur, Sadar, Comilla</td>
                         </tr>
					</thead>
            </table>
			</ul>
		</div>
		<div class="col-md-6 address_form_agile checkout-left-basket">
			  <h4>Your Previous Records</h4>

        <table class="table" border="1">
            <thead>
              <tr>
                <th scope="col" style="text-align: center"><h4>Invoice NO:</h4></th>
                <th scope="col" style="text-align: center"><h4>Total Cost</h4></th>
                <th scope="col" style="text-align: center"><h4>Status</h4></th>
                <th scope="col" style="text-align: center"><h4>Details</h4></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row" style="text-align: center">{{$order->id}}</th>
                    <td style="text-align: center">{{$order->total}}</td>
                    <td style="text-align: center">
                    @if($order->status== 0)
                         <button class='btn btn-danger'>Pending</button>
                            @elseif ($order->status == 1)
                                <button class='btn btn-primary'>On Prosess</button>
                            @elseif ($order->status == 2)
                                <button class='btn btn-success'>Completed </button>
                            @endif

                    </td>
                    <td style="text-align: center"><a href="{{route('CustomerOrderDetails',['id'=>$order->id])}}"><button class="btn btn-info">View</button></a></td>
                  </tr>
                @endforeach


            </tbody>
          </table>
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
