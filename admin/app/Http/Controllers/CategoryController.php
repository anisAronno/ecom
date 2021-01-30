<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;

class CategoryController extends Controller
{
    public function CategoryIndex()
    {
        return view("Category");
    }

    public function CategoryData()
    {
        $result = json_decode(CategoryModel::orderBy('id', 'desc')->get());
        return $result;
    }

    public function CategoryDetailsEdit(Request $request)
    {

        $id = $request->input("id");
        $result = CategoryModel::where('id', '=', $id)->get();
        return $result;
    }




    public function CategoryDelete(Request $request)
    {

        $id = $request->input("id");
        $result = CategoryModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function CategoryUpdate(Request $req)
    {

        $data = json_decode($_POST['data']);
        $id = $data['0']->id;
        $name = $data['0']->name;
        $description = $data['0']->description;

        if (($req->file('photo'))) {

            $photoPath =  $req->file('photo')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $location = "http://" . $host . "/storage/" . $photoName;

            $result = CategoryModel::where('id', '=', $id)->update(['category_name' => $name, 'category_des' => $description, 'category_img' => $location]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        } else {

            $result = CategoryModel::where('id', '=', $id)->update(['category_name' => $name, 'category_des' => $description]);
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function CategoryAdd(Request $req)
    {



        $data = json_decode($_POST['data']);
        $name = $data['0']->name;
        $description = $data['0']->description;

        $photoPath =  $req->file('photo')->store('public');
        $photoName = (explode('/', $photoPath))[1];
        $host = $_SERVER['HTTP_HOST'];
        $location = "http://" . $host . "/storage/" . $photoName;
        $result = CategoryModel::insert([
            'category_name' => $name,
            'category_des' => $description,
            'category_img' => $location,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
