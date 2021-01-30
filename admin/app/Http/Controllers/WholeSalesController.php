<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactModel;
class WholeSalesController extends Controller
{
   function contactIndex() {
        return view('WholeSales');
    }

    function getContactData() {
        $result = json_encode(contactModel::orderBy('id', 'desc')->get());
        return $result;
    }

    function contactDelete(Request $Req) {
        $id = $Req->input('id');
        $result = contactModel::where('id', '=', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    }
}
