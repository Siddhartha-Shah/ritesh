<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\Service_name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BookingResource;
use App\Models\Completed;

class ServiceController extends Controller
{
    public function add(Request $request)
    {
        $service = new Service();
        $service->provider_name = $request->provider_name;
        $service->provider_address = $request->provider_address;
        $service->provider_experience = $request->provider_experience;
        $service->provider_gender=$request->provider_gender;
        $service->provider_email=$request->provider_email;
        $service->provider_number=$request->provider_number;
        $service->provider_password=$request->provider_password;

        $service->provider_service=$request->provider_service;
        $result = $service->save();
        if ($result) {
            return redirect('service');
        } else {
            return ['data' => 'not inserted'];
        }
    }
    public function getAll($service_id=null)
    {
        return $service_id ? Service::find($service_id) :  Service::all();
    }



    public function delete($service_id)
    {
        $service = Service::find($service_id)->first();
        $result = $service->delete();
        if ($result) {
            return ["result" => "Data has ben deleted"];
        } else {
            return ["result" => "Data has not been deleted"];
        }
    }

    public function servicePage($id=null){
        if($id){
            $data=Service::find($id);
            return view("serviceForm",["data"=>$data]);
        }else{
            return view("serviceForm",["data"=>null]);
        }
        
    }

    public function serviceDetailForAdmin()
    {$ser=Service::all();
        return view("service",['ser'=>$ser]);
    }

    public function serviceDetails()
    {$ser=Service::all();
        return view("servicer.service_profile",['service'=>$ser]);
    }

    public function updateServices(Request $request){
        $service = Service::find($request->service_id);
        $service->provider_name = $request->provider_name;
        $service->provider_address = $request->provider_address;
        $service->provider_experience = $request->provider_experience;
        $service->provider_gender = $request->provider_gender;
        $service->provider_email=$request->provider_email;
        $service->provider_number = $request->provider_number;
        $service->provider_password=$request->provider_password;
        $service->provider_service = $request->provider_service;
        $service->save();
        return view("service",["ser"=>Service::all()]);
    }

    public function deleteServices($id){
        $service=Service::find($id);
        $service->delete();
        return redirect("service");
    }

    public function serviceAvailable($name){
        $ser=DB::table("bookings")
        ->select("service_id")
        ->where("customer_id", "=", session("customer_id"))
        ->get();
        $arr=array(
            ['provider_service', '=', $name],
            );
        foreach($ser as $s){
            array_push($arr,['service_id', '!=', $s->service_id]);
        }
        $service=DB::table('services')->where(
        $arr
        )->get();
        return view("service_available",["services"=>$service]);
       }
 
       public function service_profile_request(){
        return view("servicer/service_profile");
       }
       public function service_form(){
        return view("servicer/service-form");
       }

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

        $fileName=time() . "-sidhu.".$request->file('image')->getClientOriginalExtension();
        $file_extension=$request->file('image')->storeAs('public/uploads/servicer',$fileName);
       $service->provider_photo=$file_extension;

        // $image=$request->input('provider_photo');
        //     $new_name=rand().'.'.$image->getClientOriginalExtension();
        //    $image->move(public_path('/uploads/images'),$new_name);  
        //     $service->provider_photo=$request->provider_photo;
          $result=$service->save();

        if($result){
            return redirect("/service");
            
        }else{
            return ["Service Provider"=>"Did not added"];
            
        }

        
       }
       public function servicer_login(Request $request){
        if(session()->has('service_provider')){
            return view("servicer/service_profile");
        }
        return view("servicer/servicer_login");
     
      }

      public function servicer_logout(Request $request){
        if(session()->has('service_provider')){
            session()->pull('service_provider');
            session()->pull('service_id');
            session()->pull('photo');
            
        }
        return view("servicer/servicer_login");
     
      }

      public function servicerLoggedIn(Request $request){
        $services=Service::where('provider_email',"=",$request->provider_email)->first();
        if(empty($services)){
            return ["email"=>"invalid"];
        }
            if($services->provider_password===$request->provider_password){
                $request->session()->put("service_provider",[$services->provider_name,$services->provider_experience,$services->provider_address,$services->provider_number,$services->provider_email]);
                $request->session()->put("service_id",$services->service_id);
                $request->session()->put("photo",$services->provider_photo);

             // echo(asset("storage/".session("photo")));
                //echo asset("");
                return view("servicer/service_profile");
            }
            
            else return ["password"=>"did not match"];  
      }

      public function uploadImage(Request $request){
        $fileName=time() . "-sidhu.".$request->file('image')->getClientOriginalExtension();
        $file_extension=$request->file('image')->storeAs('public/uploads/servicer',$fileName);
       $service=Service::find(session('service_id'));
       $service->provider_photo=$file_extension;
       $service->save();
       $request->session()->put("photo",$service->provider_photo);
       return redirect("servicer/login");
      }

      public function servicer_request(){
         //$booking=Booking::with('customer')->get();

        $bookings = Booking::all();
       $list=BookingResource::collection($bookings)->where("action","=","requested")
       ->where("service_id","=",session("service_id"));
       //return $list[0]->action;
       return view("servicer/servicer_request",["bookings"=>$list]);
      }

      public function selectService(Request $request,$s_id){
        $booking=new Booking();
        $booking->action="requested";
        $booking->customer_id=session('customer_id');
        $booking->service_id=$s_id;
        $booking->message=$request->message;
        $booking->save();

        return redirect("/customer/requested_services");
        // echo "<pre>";
        // print_r($booking->booking_id);
        // echo "</pre>";
      }
      public function customer_cancel_request($sid,$cid){
        $booking=Booking::where("service_id",$sid)->where("customer_id",$cid);
        $booking->delete();
        return redirect("/customer/requested_services");
      }

      public function customer_completed_work(){
        $ser=DB::table("completeds")
        ->select("service_id")
        ->where([
            ["customer_id", "=", session("customer_id")],
            ["action", "=", "completed"]
            ])
        ->get();
        $arr=array();
        foreach($ser as $s){
            array_push($arr,$s->service_id);
        }
        $service=Service::find($arr);
        
         return view("customer/completed_work",["services"=>$service]);

      }


      public function requested_service(){
        $ser=DB::table("bookings")
        ->select("service_id")
        ->where([
            ["customer_id", "=", session("customer_id")],
            ["action", "=", "requested"]
            ])
            ->orWhere([
                ["customer_id", "=", session("customer_id")],
                ["action", "=", "accepted"]
                ])
        ->get();
        $arr=array();
        foreach($ser as $s){
            array_push($arr,$s->service_id);
        }
        $service=Service::find($arr);
        //return $service;
        
         return view("customer/customer_request",["services"=>$service]);
      } 

      public function acceptBookingAction($id){
      
        $booking=Booking::find($id);
        $booking->action="accepted";
        $booking->save();
       return redirect("servicer/servicer_request");
        
    }
    public function reject($id){
        $booking=Booking::find($id);
        // return $booking;
        $booking->delete();
       return redirect("servicer/servicer_request");
    }
    public function completeBookingAction($id){
        $booking=Booking::find($id);
        $booking->action="completed";
        $booking->save();

        $completed=new Completed();
        $completed->action=$booking->action;
        $completed->service_id=$booking->service_id;
        $completed->customer_id=$booking->customer_id;
        $completed->save();

        $booking->delete();
       return redirect("servicer/servicer_request");
    }

    public function servicer_pending_work(){
        $bookings = Booking::all();
       $list=BookingResource::collection($bookings)->where("action","=","accepted")
       ->where("service_id","=",session("service_id"));
        return view("servicer/servicer_pending_work",["bookings"=>$list]);

    }

    public function servicer_completed_work(){
        $ser=DB::table("completeds")
        ->select("customer_id")
        ->where([
            ["service_id", "=", session("service_id")],
            ["action", "=", "completed"]
            ])
        ->get();
        $arr=array();
        foreach($ser as $s){
            array_push($arr,$s->customer_id);
        }
        $customer=Customer::find($arr);
        //return $customer;
        // return view("customer/completed_work",["services"=>$service]);
         return view("servicer/servicer_completed_work",["bookings"=>$customer]);

    }

    public function serviceForm(){
        $service_name=Service_name::all();
        return view("/serviceForm",["service_name"=>$service_name]);
    }
   
    public function servicer_logged_in_via_signup(Request $request){
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
        $fileName=time() . "-sidhu.".$request->file('image')->getClientOriginalExtension();
        $file_extension=$request->file('image')->storeAs('public/uploads/servicer',$fileName);
       $service->provider_photo=$file_extension;
       $result=$service->save();

        $services=Service::where('provider_email',"=",$request->provider_email)->first();
        if(empty($services)){
            return ["email"=>"invalid"];
        }
            if($services->provider_password===$request->provider_password){
                $request->session()->put("service_provider",[$services->provider_name,$services->provider_experience,$services->provider_address,$services->provider_number,$services->provider_email]);
                $request->session()->put("service_id",$services->service_id);
                $request->session()->put("photo",$services->provider_photo);

             // echo(asset("storage/".session("photo")));
                //echo asset("");
                return view("servicer/service_profile");
            }
            
            else return ["password"=>"did not match"];  
    }



    
}