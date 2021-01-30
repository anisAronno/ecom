<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class CategoryProductShow extends Controller
{
    public function index(Request $request, $id)
    {
         $categories=CategoryModel::where('id','=', $id)->first();
        $products=ProductModel::where('category_id','=', $id)->get();
        return view('grocery_shop.product', compact('products','categories'));
    }
}
