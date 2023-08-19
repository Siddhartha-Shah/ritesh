<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Customer;
class IndexController extends Controller
{
    public function index(){
        return Customer::with('service')->get();
    }

    public function index2(){
        return Service::with('customer')->get();
    }
}
