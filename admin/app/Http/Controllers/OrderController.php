<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\OrderModel;
use App\Models\OrderDetailsModel;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
   public function order_show(Request $request)
   {
   	$orders= DB::table('orders')->get();
   	return view('order',compact('orders'));
   }

   public function load_order_data()
   {
       $orders= DB::table('orders')->get();
       return $orders;

   }

   public function order_details(Request $request)
   {

       $id=$request->id;
       $orders = DB::table('orders')
       ->join('order_details','orders.id', 'order_details.order_id')
       ->select('orders.customer_name','orders.contact_no','order_details.*')->where('orders.id',$id)->get();

       return $orders;

   }
   public function shipping_confirm(Request $request)
   {


        $shipping=orderModel::where('id', $request->id)->update(['status' => 2]);
        return 1;



    //dd($shipping);
   }
}
