<?php

namespace App\Http\Controllers;

use App\PhotoModel;
use Illuminate\Http\Request;


class PhotoController extends Controller
{
    function PhotoIndex()
    {

        return view('Photo');
    }



    function PhotoJSON()
    {
        return PhotoModel::all();
    }



    public function uploadImage(Request $request)
    {


        $photoPath =  $request->file('photo')->store('public');

        $photoName = (explode('/', $photoPath))[1];

        $host = $_SERVER['HTTP_HOST'];
        $location = "http://" . $host . "/public/storage/" . $photoName;

        $result = PhotoModel::insert(['location' => $location]);
        return $result;
    }
}
