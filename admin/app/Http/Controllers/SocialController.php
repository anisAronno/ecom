<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialModel;
class SocialController extends Controller
{
    public function SocialIndex(){
        
        $results = json_decode(SocialModel::orderBy('id', 'desc')->get()->first());


        return view('Social', [
            'results'=>$results
        ]);    
    } 
        
        
    public function addFacebook(Request $request)
    {
        $facebook = $request->input("facebook");

        $valuecheck = (SocialModel::orderBy('id', 'desc')->get());

       

        if( count($valuecheck)>0){
            $result = SocialModel::where('id', '=',  $valuecheck['0']->id)->update(['facebook' => $facebook]); 
        }
        else{
            $result = SocialModel::insert(['facebook' => $facebook]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addTwitter(Request $request)
    {
        $twitter = $request->input("twitter");

        $valuecheck = (SocialModel::orderBy('id', 'desc')->get());

        

        if( count($valuecheck)>0){
            $result = SocialModel::where('id', '=',  $valuecheck['0']->id)->update(['twitter' => $twitter]); 
        }
        else{
            $result = SocialModel::insert(['twitter' => $twitter]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addYoutube(Request $request)
    {
        $youtube = $request->input("youtube");

        $valuecheck = (SocialModel::orderBy('id', 'desc')->get());

        

        if( count($valuecheck)>0){
            $result = SocialModel::where('id', '=',  $valuecheck['0']->id)->update(['youtube' => $youtube]); 
        }
        else{
            $result = SocialModel::insert(['youtube' => $youtube]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



    public function addInstragram(Request $request)
    {
        $instragram = $request->input("instragram");

        $valuecheck = (SocialModel::orderBy('id', 'desc')->get());

        

        if( count($valuecheck)>0){
            $result = SocialModel::where('id', '=',  $valuecheck['0']->id)->update(['instragram' => $instragram]); 
        }
        else{
            $result = SocialModel::insert(['instragram' => $instragram]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addGoogle(Request $request)
    {
        $google = $request->input("google");

        $valuecheck = (SocialModel::orderBy('id', 'desc')->get());

        

        if( count($valuecheck)>0){
            $result = SocialModel::where('id', '=',  $valuecheck['0']->id)->update(['google' => $google]); 
        }
        else{
            $result = SocialModel::insert(['google' => $google]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    public function addLinkin(Request $request)
    {
        $linkin = $request->input("linkin");

        $valuecheck = (SocialModel::orderBy('id', 'desc')->get());

        

        if( count($valuecheck)>0){
            $result = SocialModel::where('id', '=',  $valuecheck['0']->id)->update(['linkin' => $linkin]); 
        }
        else{
            $result = SocialModel::insert(['linkin' => $linkin]);
        }
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

}
