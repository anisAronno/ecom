@extends('layout.master');
@section('content');
<div class="privacy about">
	<h3>Wish<span>list</span></h3>

  <div class="checkout-right">
            @php $cartItems=Cart::getContent(); @endphp
		<table class="timetable_sub" id="result">
			<thead>
				<tr>
					<th>SL No.</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Add To Cart</th>
					<th>View</th>
				</tr>
			</thead>
			<tbody id="cart-items">
                @foreach($cartItems as $item)
                <tr class="rem1" id="totalPrice">
				<td class="invert">{{$item->id}}</td>
				<td class="invert-image"><a href="{{url('single')}}"><img src="{{asset('asset/images/1.png')}}" alt=" " class="img-responsive"></a></td>
                <td class="invert">{{$item->name}}</td>
                <td class="invert"></td>
				<td class="invert" ></td>
				<td class="invert"><a href="{{ route('single.product', ['id'=>$product->id]) }}"><img title=" " alt=" " src="{{$product->images}}" style="width: 200px; height:130px"/></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
	</div>

</div>
@endsection

