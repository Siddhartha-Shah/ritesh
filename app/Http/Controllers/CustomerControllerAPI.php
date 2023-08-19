<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerControllerAPI extends Controller
{
    
    public function addCustomer(Request $request){
        $customer=new Customer();
        $customer->customer_name=$request->customer_name;
        $customer->customer_email= $request->customer_email;
        $customer->customer_address= $request->customer_address;
        $customer->customer_number=$request->customer_number;
        $customer->customer_password= $request->customer_password;
        $result=$customer->save();
        if($result){
            return ["data"=>"sucessfully entered"];
        }else{
            return ["data"=>"not entered"];
        }
       }
    
       public function getCustomer($customer_id=null){
        return $customer_id ? Customer::find($customer_id) : Customer::all();
       }
       public function updateCustomer(Request $request){
        $customer=Customer::find($request->customer_id)->first();
        if($customer){
           $customer->customer_name=$request->customer_name;
           $customer->customer_email= $request->customer_email;
           $customer->customer_address= $request->customer_address;
           $customer->customer_number=$request->customer_number;
           $customer->customer_password= $request->customer_password;
        $result=$customer->save();
        if($result){
            return ["data"=>"sucessfully updated"];
        }else{
            return ["data"=>"not updated"];
        }
        }else{
            return ["id"=>"not found"];
        }
       }
    
    
       public function deleteCustomer($customer_id){
        $customer=Customer::find($customer_id);
        $result=$customer->delete();
   
        if(!$customer){
            return ["id"=>"not found"];
        }else{
            return ["id"=>"deleted"];
        }
       }
}
