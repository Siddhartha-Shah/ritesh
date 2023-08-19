<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function signupForServicer(){
        return view("servicer.service-form");
    }


    public function signupForCustomer(){
        return view("customer.customerForm");
    }
}
