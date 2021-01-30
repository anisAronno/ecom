<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function customer_login(Request $request)
   {
    $phone= $request->input('phone');
    $pass= $request->input('Password');

    $user=CustomerModel::where('phone','=',$phone)->where('pass','=',md5($pass))->get();
    $orders=Order::where('contact_no','=',$phone)->get();
    //dd($orders);
    if ($user == true ) {
       $request->session()->put('data', $user);
       return view('grocery_shop.user_profile',compact('orders'));
    }else{
        return view('grocery_shop.login');
    }


   }
}
