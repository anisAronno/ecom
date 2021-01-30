<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BrandModel;

class BrandController extends Controller
{

    public function BrandIndex()
    {
        return view("Brands");
    }

    public function BrandData()
    {
        $result = json_decode(BrandModel::orderBy('id', 'desc')->get());
        return $result;
    }


    function BrandDelete(Request $req)
    {
        $id = $req->input('id');
        $result = BrandModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function BrandDetailEdit(Request $req)
    {
        $id = $req->input('id');
        $result = json_encode(BrandModel::where('id', '=', $id)->get());
        return $result;
    }



    function BrandUpdate(Request $req)
    {


        $data = json_decode($_POST['data']);
        $id = $data['0']->id;
        $name = $data['0']->name;
        $description = $data['0']->description;
        if ($req->file('photo')) {
            $photoPath =  $req->file('photo')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $location = "http://" . $host . "/public/storage/" . $photoName;
            $result = BrandModel::where('id', '=', $id)->update(['brand_name' => $name, 'brand_des' => $description, 'brand_img' => $location]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $result = BrandModel::where('id', '=', $id)->update(['brand_name' => $name, 'brand_des' => $description]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }


    }



    function BrandAdd(Request $req)
    {

        $data = json_decode($_POST['data']);
        $name = $data['0']->name;
        $description = $data['0']->description;

        $photoPath =  $req->file('photo')->store('public');
        $photoName = (explode('/', $photoPath))[1];
        $host = $_SERVER['HTTP_HOST'];
        $location = "http://" . $host . "/storage/" . $photoName;
        $result = BrandModel::insert([
            'brand_name' => $name,
            'brand_des' => $description,
            'brand_img' => $location,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
