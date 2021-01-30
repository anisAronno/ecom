<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SliderModel;

class SliderController extends Controller
{
    
    public function SliderIndex()
    {
        return view("Slider");
    }

    public function SliderData()
    {
        $result = json_decode(SliderModel::orderBy('id', 'desc')->get());
        return $result;
    }


    function SliderDelete(Request $req)
    {
        $id = $req->input('id');
        $result = SliderModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function SliderDetailEdit(Request $req)
    {
        $id = $req->input('id');
        $result = json_encode(SliderModel::where('id', '=', $id)->get());
        return $result;
    }



    function SliderUpdate(Request $req)
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
            $result = SliderModel::where('id', '=', $id)->update(['title' => $name, 'sub_title' => $description, 'image' => $location]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $result = SliderModel::where('id', '=', $id)->update(['title' => $name, 'sub_title' => $description]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }





       
    }



    function SliderAdd(Request $req)
    {

        $data = json_decode($_POST['data']);
        $name = $data['0']->name;
        $description = $data['0']->description;

        $photoPath =  $req->file('photo')->store('public');
        $photoName = (explode('/', $photoPath))[1];
        $host = $_SERVER['HTTP_HOST'];
        $location = "http://" . $host . "/storage/" . $photoName;
        $result = SliderModel::insert([
            'title' => $name,
            'sub_title' => $description,
            'image' => $location,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
