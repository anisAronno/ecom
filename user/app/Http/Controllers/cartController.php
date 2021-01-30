<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
class cartController extends Controller
{
    public function add_to_cart(Request $request){
        $data=array();
          if(Cart::get($request->product_id)){
             return response()->json([
                 'success'=>false,
                 'msg'=>"The Product Already Exists In the cart",
                 'class'=>'danger'
             ],200) ;
         }

         $data['id']=$request->id;
         $data['title']=$request->title;
         $data['price']=$request->price;
         $data['offer']=$request->offer;
         $data['quantity']=1;
        //   dd($data);

         if(Cart::add($data)){
             $notification=array(
                 'message'=>'Product Successfully Added To Cart',
                 'alert_typr'=>'success'
             );
             return redirect()->back()->with($notification);
            // echo"Product Successfull Added";
            //  $product=Cart::get($request->id);
            //  return response()->json([
            //      'success'=>true,
            //      'msg'=>"Product Succesfully Added In the cart",
            //      'class'=>'success',
            //      'product'=>$product,
            //      'total'=>Cart::getTotal()
            //  ],200) ;
            //  if (success) {
            //    echo"Product Successfull Added";
            //  }
         }

    }
    public function remove_form_cart(Request $request){
        $id=$request->id;
        // dd($id);
		$remove=Cart::remove($id);
		if($remove){
            return redirect()->back();
			// return response()->json([
			// 	'success'=>true,
			// 	'total'=>Cart::getTotal()
			// ],200) ;
		}
	}
}
