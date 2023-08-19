<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    // public function BookingDetails(){

    //     return view("bookings");
    // }

    public function index(){
        $bookings = Booking::all();
        return BookingResource::collection($bookings)->where("action","=","requested");
    }
    public function getBookingForCustomer(){
        return Booking::with('customer')->get();
    }
    public function getBookingForService(){
        return Booking::with('service')->get();
    }
    public function getBooking(){
        return Booking::all();
    }
    public function BookingDetails(Request $request){
    $list = DB::table('bookings')
    ->join('customers', 'bookings.customer_id', '=', 'customers.customer_id')
    ->join('services', 'bookings.service_id', '=', 'services.service_id')
    ->get();



    // echo ("<pre>");
    // print_r($list);
    // echo("</pre>");
   return view('bookings',["getData"=>$list]);
    
    }

      

}
