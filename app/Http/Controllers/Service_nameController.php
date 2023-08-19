<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service_name;
class Service_nameController extends Controller
{
    public function addServiceName(Request $request){
        $service_name=new Service_name();
        $service_name->service=$request->service;
        $fileName=time() . "-service.".$request->file('image')->getClientOriginalExtension();
        $file_extension=$request->file('image')->storeAs('public/uploads/services',$fileName);
        $service_name->service_photo=$file_extension;
       $service_name->save();

       return redirect("selectAllService");
    }

    public function addService(Request $request){
       return view("serviceNames");
    }

    public function selectAllService(){
        $ser=Service_name::all();
        return view("services",["ser"=>$ser]);
    }
}
