<?php

namespace App\Http\Controllers;

//use Darryldecode\Cart\Cart;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use DB;
use Cart;
class CustomerOrderController extends Controller
{
    public function order_insert(Request $request)
    {
        $validate=$request->validate([
			'name'=>'required','string',
			'con'=>'required','nunber'
        ],
        [
            'name.required'=>'This name is required',
            'con.required'=>'Contact number is required',


        ]
    );
       $data= array();
       $data['customer_name']=$request->name;
       $data['contact_no']=$request->con;
       $data['total']=Cart::getTotal();

   $insert=Order::create($data);
    if ($insert) {
        $items=Cart::getContent();
        //As the shopping cart contain many products so we need a array to keep the shopping cart products
       $allDetails=array();
       foreach($items as $item){
            $details['order_id']=$insert->id;
            $details['product_name']=$item->name;
            $details['product_amount']=$item->quantity;
            $details['unit_price']=$item->price;
            $details['total_price']=($item->price*$item->quantity);
            $allDetails[]=$details;
       }
       $insertDetail=OrderDetails::insert($allDetails);
       if ($insertDetail !='') {
        Cart::clear();
        return redirect()->back();

       }
       else{
           echo "Your Cart is empty";
       }
    }


      //dd($allDetails);
    }
    public function customer_order($id)
    {
        $coutomer_orders = DB::table('orders')
        ->join('order_details','orders.id', 'order_details.order_id')
        ->select('orders.id','order_details.*')->where('orders.id',$id)->get();
       //dd($coutomer_orders);
       return view('grocery_shop.customerOrder', compact('coutomer_orders'));
    }

    public function customer_wishlist($id)
    {
        return view('grocery_shop.wishlist');
    }
}
