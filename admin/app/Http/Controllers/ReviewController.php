<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewModel;

class ReviewController extends Controller
{
    public function ReviewIndex()
    {
        return view("Reviews");
    }

    public function ReviewData()
    {
        $result = json_decode(ReviewModel::orderBy('id', 'desc')->get());
        return $result;
    }

    public function ReviewDetailsEdit(Request $request)
    {

        $id = $request->input("id");
        $result = ReviewModel::where('id', '=', $id)->get();
        return $result;
    }




    public function ReviewDelete(Request $request)
    {

        $id = $request->input("id");
        $result = ReviewModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function ReviewUpdate(Request $request)
    {

        $id = $request->input("id");
        $name = $request->input("name");
        $des = $request->input("des");
        $img = $request->input("img");

        $result = ReviewModel::where('id', '=', $id)->update(['name' => $name, 'des' => $des, 'img' => $img]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function ReviewAdd(Request $request)
    {

        $name = $request->input("name");
        $des = $request->input("des");
        $img = $request->input("img");

        $result = ReviewModel::insert(['name' => $name, 'des' => $des, 'img' => $img]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
