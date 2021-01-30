<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ContactModel;
use App\CategoryModel;
use App\BrandModel;
use App\ReviewModel;
use App\ProductModel;
use App\VisitorTable;

class HomeController extends Controller
{

    function HomeIndex(){

        $TotalContact= ContactModel::count();
        $TotalCategory=CategoryModel::count();
        $TotalBrand=BrandModel::count();
        $TotalReview=ReviewModel::count();
        $TotalProduct=ProductModel::count();
        $TotalVisitor=VisitorTable::count();

         return view('Home',[
            'TotalContact'=>$TotalContact, 
            'TotalCategory'=>$TotalCategory,
            'TotalBrand'=>$TotalBrand,
            'TotalReview'=>$TotalReview,
            'TotalProduct'=>$TotalProduct,
            'TotalVisitor'=>$TotalVisitor
         ]);
     }
}
