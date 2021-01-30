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
				<td class="invert-image"><a href="{{ route('single.product', ['id'=>$item->id]) }}"><img title=" " alt=" " src="{{$item->images}}"></a></td>
                <td class="invert">{{$item->name}}</td>
                <td class="invert">{{$item->price}}</td>

                <td class="invert" >
                    <div class="snipcart-details agileinfo_single_right_details">
                        <form action="{{route('addToCat')}}" method="post" class="cart">
                            @csrf
                            <fieldset>
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
                </td>
				<td class="invert">
					<div class="rem">
                        <button>	<a href="{{ route('single.product', ['id'=>$item->id]) }}">View</a></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
	</div>

</div>
@endsection

