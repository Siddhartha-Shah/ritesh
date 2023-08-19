<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\Service_name;
class CustomerController extends Controller
{

    public function add(Request $request){
        $customer=new Customer();
        $customer->customer_name=$request->customer_name;
        $customer->customer_email= $request->customer_email;
        $customer->customer_address= $request->customer_address;
        $customer->customer_number=$request->customer_number;
        $customer->customer_password= $request->customer_password;

        $fileName=time() . "-customer.".$request->file('image')->getClientOriginalExtension();
        $file_extension=$request->file('image')->storeAs('public/uploads/customer',$fileName);
       $customer->customer_photo=$file_extension;

        $result=$customer->save();
        if($result){
            return redirect('/customers');
        }else{
            return ["data"=>"not entered"];
        }
       }
   
       public function deleteCustomer($customer_id){
        $customer=Customer::find($customer_id);
        $result=$customer->delete();
   
        if(!$customer){
            return ['id'=>'not delted'];
        }else{
            return redirect('/customers');
        }
       }
   
   public function customerForm($id=""){
    $data=$id;
    if($id){
    $data=Customer::find($id);
    return view("customer_form",["data"=>$data]);}
    else{
        return view("customer_form",["data"=>null]);
    }
   
    
   }
   public function customersDetails(){
    $customer=Customer::all();
     return view("customer",["getData"=>$customer]);
   }
   public function profile(){
    return view("components.customer_navbar");
   }
 

   public function deleteCust($id){
    $customer=Customer::find($id);
    $customer->delete();
    $customer=Customer::all();
     return view("customer",["getData"=>$customer]);
    
   }
   public function updateCustomer(Request $req){

    $customer=Customer::find($req->customer_id);
    if($customer){
       // $customer->customer_id=$req->customer_id;
    $customer->customer_name=$req->customer_name;
    $customer->customer_email= $req->customer_email;
    $customer->customer_number= $req->customer_number;
    $customer->customer_address=$req->customer_address;
    $customer->customer_password= $req->customer_password;
    $customer->service_id= $req->service_id;
    $customer->save();
    $customers=Customer::all();
    return view("customer",["getData"=>$customers]);

   }
}
public function customerRequestForService(Request $req){
    $customer=Customer::find($req->customer_id);
    $service=Service::find($req->service_id);
    $booking=new Booking();
    $booking->action="requested";
    $booking->customer_id=$customer->customer_id;
    $booking->service_id=$service->service_id;
    $booking->save();

}

public function customer_login(Request $req){
    if(session()->has('customer')){
        return view("customer/customer_profile");
    }
    return view("customer.customer_login");
}
public function customer_logged_in(Request $request){
    $customer=Customer::where('customer_email',"=",$request->customer_email)->first();
        if(empty($customer)){
            return ["email"=>"invalid"];
        }
            if($customer->customer_password===$request->customer_password){
                $request->session()->put("customer",[$customer->customer_name,$customer->customer_email,$customer->customer_address,$customer->customer_number]);
                $request->session()->put("customer_id",$customer->customer_id);
                $request->session()->put("customer_photo",$customer->customer_photo);
                return view("customer/customer_profile");
            }
            else return ["password"=>"did not match"];  
}

public function uploadImage(Request $request){
    $fileName=time() . "-customer.".$request->file('image')->getClientOriginalExtension();
    $file_extension=$request->file('image')->storeAs('public/uploads/customer',$fileName);
   $customer=Customer::find(session('customer_id'));
   $customer->customer_photo=$file_extension;
   $customer->save();
   $request->session()->put("customer_photo",$customer->customer_photo);
   return redirect("customer/login");
  }

public function customer_logout(){
    if(session()->has('customer')){
        session()->pull('customer');
        session()->pull('customer_id');
        session()->pull('customer_photo');
    }

    return view("customer.customer_login");
}

public function customer_service(){
    $services=Service_name::all();
    return view("customer.customer_service",["services"=>$services]);
}

}
