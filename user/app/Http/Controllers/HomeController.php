<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
class HomeController extends Controller
{
   public function index()
   {


      $products=ProductModel::all();
      return view("grocery_shop.home", compact( 'products'));

}
}
