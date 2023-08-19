<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Service;
class ServiceControllerAPI extends Controller
{
    public function addServicer(Request $request){
        $service = new Service();
        $service->provider_name = $request->provider_name;
        $service->provider_address = $request->provider_address;
        $service->provider_experience = $request->provider_experience;
        $service->provider_gender=$request->provider_gender;
        $service->provider_email=$request->provider_email;
        $service->provider_number=$request->provider_number;
        $service->provider_password=$request->provider_password;
        $service->provider_confirm_password=$request->provider_confirm_password;
        $service->provider_service=$request->provider_service;
        // $image=$request->file('provider_photo');
        //     $new_name=rand().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('/uploads/images'),$new_name);  
        //     $service->provider_photo=$request->provider_photo;
         $result=$service->save();
        if($result){
            return ["data"=>"Inserted "];
        }else{
            return ["data"=>"Not Inserted"];
        }
    }
    
    public function getServicer($id=null){
        return $id ? Service::find($id) : Service::all();
        }

        public function updateServicer(Request $request){
            $service = Service::find($request->service_id);
            $service->provider_name = $request->provider_name;
            $service->provider_address = $request->provider_address;
            $service->provider_experience = $request->provider_experience;
            $service->provider_gender = $request->provider_gender;
            $service->provider_email=$request->provider_email;
            $service->provider_number = $request->provider_number;
            $service->provider_password=$request->provider_password;
            $service->provider_service = $request->provider_service;
            $result=$service->save();
            if ($result) {
                return ["result" => "data has been updated"];
            } else {
                return ["result" => "data has not been updated"];
            }
        }

        public function deleteServicer($id){
            $service=Service::find($id)->first();
            $delete=$service->delete();
            if($delete){
                return ["services"=>"deleted"];
            }else{
                return ["services"=>"Not Deleted"];
            }
        }

        
    
}
