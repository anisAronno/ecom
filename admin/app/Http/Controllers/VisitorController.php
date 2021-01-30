<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorTable;

class VisitorController extends Controller
{
    //
    public function VisitorIndex()
    {

        $visitorData = json_decode(VisitorTable::orderBy('id','desc')->take(1000)->get(), true);
        return view("Visitor", ['visitorData' => $visitorData]);
    }
}
