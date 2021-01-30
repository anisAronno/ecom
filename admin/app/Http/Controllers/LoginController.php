<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel;
class LoginController extends Controller
{
    function LoginIndex(){
    	return view('loginSasi');
    }

    function onLogout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }


    function onLogin(Request $request){
       $user= $request->input('user');
       $pass= $request->input('pass');
       $countValue=AdminModel::where('username','=',$user)->where('password','=',md5($pass))->count();

        if($countValue==1){
            // session(['user' => $user]);
            $request->session()->put('user',$user);

            return 1;
        }
        else{
            return 0;
        }

    }
}
