<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{
   public function AdminIndex(){

    return view('Admin');
   }


   public function AdminData()
   {
       $result = json_decode(AdminModel::orderBy('id', 'desc')->get());
       return $result;
   }


   function AdminDelete(Request $req)
   {
       $id = $req->input('id');
       $result = AdminModel::where('id', '=', $id)->delete();
       if ($result == true) {
           return 1;
       } else {
           return 0;
       }
   }

   function AdminDetailEdit(Request $req)
   {
       $id = $req->input('id');
       $result = json_encode(AdminModel::where('id', '=', $id)->get());
       return $result;
   }



   function AdminUpdate(Request $req)
   {
       $id = $req->Input('id');
       $name = $req->Input('name');
       $password =$req->Input('password');
       $username = $req->Input('username');
       $email = $req->Input('email');

     
        $result = AdminModel::where('id', '=', $id)->update(['name' => $name, 'password' =>  md5($password), 'username' => $username, 'email' => $email]);
           if ($result == true) {
               return 1;
           } else {
               return 0;
           }

   }
   





   
   function AdminAdd(Request $req)
   {
       $name = $req->Input('name');
       $password = $req->Input('password');
       $username = $req->Input('username');
       $email = $req->Input('email');

       
       $result = AdminModel::insert([
        'name' => $name, 
        'password' =>  md5($password), 
        'username' => $username,
        'email' => $email
       ]);
       if ($result == true) {
           return 1;
       } else {
           return 0;
       }
   }


}
