<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;
use App\BrandModel;
use App\CategoryModel;

class ProductController extends Controller
{
    public function ProductIndex()
    {
        return view("Products");
    }


    public function ProductData()
    {
        $result = json_decode(ProductModel::orderBy('id', 'desc')->get());
        return $result;
    }



    //get category
    public function getCategory()
    {
        $result = json_decode(CategoryModel::select('id', 'category_name')->orderBy('id', 'desc')->get());
        return $result;
    }



    //get brand
    public function getbrand()
    {
        $result = json_decode(BrandModel::select('id', 'brand_name')->orderBy('id', 'desc')->get());
        return $result;
    }








    function ProductDelete(Request $req)
    {
        $id = $req->input('id');
        $result = ProductModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function ProductDetailEdit(Request $req)
    {
        $id = $req->input('id');
        $result = json_encode(ProductModel::where('id', '=', $id)->get());
        return $result;
    }



    function ProductUpdate(Request $req)
    {
        $data = json_decode($_POST['data']);

        $id = $data[0]->id;
        $title = $data[0]->title;
        $description = $data[0]->description;
        $price = $data[0]->price;
        $offer = $data[0]->offer;
        $quantity = $data[0]->quantity;
        $slug = $data[0]->slug;
        $feature_product = $data[0]->feature_product;
        $cat_id = $data[0]->cat_id;
        $brand_id = $data[0]->brand_id;
        $status = $data[0]->status;




        if ($req->file('image')) {





            $photoPath =  $req->file('image')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $location = "http://" . $host . "/storage/" . $photoName;

            $result = ProductModel::where('id', '=', $id)->update(['title' => $title, 'description' => $description, 'price' => $price, 'offer' => $offer, 'quantity' => $quantity, 'slug' => $slug, 'feature_product' => $feature_product, 'category_id' => $cat_id, 'brand_id' => $brand_id, 'status' => $status, 'images' => $location]);

            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
            // }
        } else {
            $result = ProductModel::where('id', '=', $id)->update(['title' => $title, 'description' => $description, 'price' => $price, 'offer' => $offer, 'quantity' => $quantity, 'slug' => $slug, 'feature_product' => $feature_product, 'category_id' => $cat_id, 'brand_id' => $brand_id, 'status' => $status]);

            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
    }





    function ProductAdd(Request $req)
    {

        $data = json_decode($_POST['data']);
        $title = $data[0]->title;
        $description = $data[0]->description;
        $price = $data[0]->price;
        $offer = $data[0]->offer;
        $quantity = $data[0]->quantity;
        $slug = $data[0]->slug;
        $feature_product = $data[0]->feature_product;
        $cat_id = $data[0]->cat_id;
        $brand_id = $data[0]->brand_id;
        $status = $data[0]->status;



        $photoPath =  $req->file('image');


        $allowedfileExtension = ['jpg', 'png', 'webp'];





        $extension = $photoPath->getClientOriginalExtension();
        $check = in_array($extension, $allowedfileExtension);

        if ($check) {

            $photoPath =  $req->file('image')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $location = "http://" . $host . "/storage/" . $photoName;

            $result = ProductModel::insert([
                'title' => $title,
                'description' => $description,
                'price' => $price,
                'offer' => $offer,
                'quantity' => $quantity,
                'slug' => $slug,
                'feature_product' => $feature_product,
                'category_id' => $cat_id,
                'brand_id' => $brand_id,
                'status' => $status,
                'images' => $location
            ]);

            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
    }
}
