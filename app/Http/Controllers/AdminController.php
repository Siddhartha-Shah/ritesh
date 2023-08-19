<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminPage(Request $request){
        // echo "<pre>";
        // print_r($request);
        // echo "</pre>";
        //&& $request->input('password')=="admin123"
        if($request->input('email')=="admin@admin.com" && $request->input('password')=="admin@123" ){
            $user=User::all();
            return view("admin",["getData"=>$user]);
        }
        
        // else redirect("/login");

       // return view("admin")
    }
    public function adminPageFromLogin(){
        $user=User::all();
        return view("admin",["getData"=>$user]);
    }
}
