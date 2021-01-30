<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactModel;

class MessageController extends Controller
{
   public function MessageIndex(){
       return view("Messages");
   }
   public function MessageData()
   {
       $result = json_decode(ContactModel::orderBy('id','desc')->get());
       return $result;
   }

   public function MessageDelete(Request $request)
   {

       $id = $request->input("id");
       $result = ContactModel::where('id', '=', $id)->delete();
       if ($result == true) {
           return 1;
       } else {
           return 0;
       }
   }
}
