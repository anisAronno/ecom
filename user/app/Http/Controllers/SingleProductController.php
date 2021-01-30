<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
   public function SingleProductShow(Request $request, $id)
   {
    $products=ProductModel::where('id','=', $id)->first();
    // dd($products);
    return view('grocery_shop.single')->with('image', $products);
   }
}
