<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use Validator;
class UserController extends Controller
{
    public function signup(Request $req){
        $rules=array(
            "user_id"=> "required|min:2|max:6|unique:users,user_id",
            "user_name" => "required|min:2|max:16|unique:users,user_name",
            "full_name" => "required|min:4|max:20",
            "email" => "required|email|unique:users,email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",
            "phone_number" => "required|numeric|min:9|unique:users,phone_number",
            "password" => "required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",
            "confirm_password"=>"required|same:password"
        
        );
        $validator = Validator::make($req->all(), $rules);
       
        if($validator->fails()){
            return $validator->errors();
        }else{
              $user=new User();
              $user->user_id=$req->user_id;
            $user->user_name=$req->user_name;
            $user->full_name=$req->full_name;
            $user->phone_number=$req->phone_number;
            $user->email=$req->email;
            $user->password=$req->password;
            $user->confirm_password=$req->confirm_password;
            $result=$user->save();
            if($result){
                return ['data'=>'sucess'];
            }else{
                return ['data'=>'not sucess'];
            }
            
            }
    }
    public function signUpForWeb(){
        return view("login");
    }
    public function login(Request $request){
        $user=User::where('user_name',"=",$request->user_name)->first();
        if(empty($user)){
            return ["username"=>"invalid"];
        }
            if($user->password===$request->password)
            return ["login"=>"sucess"];
            else return ["password"=>"did not match"];     
    }

    public function loginPage(Request $request){
        return view("login");
    }
}
