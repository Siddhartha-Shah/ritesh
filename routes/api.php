<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceControllerAPI;
use App\Http\Controllers\CustomerControllerAPI;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/signup",[UserController::class,"signup"]);
Route::post("/signup",[UserController::class,"signup"]);

Route::get("/login",[UserController::class,"login"]);
Route::post("/login",[UserController::class,"login"]);

Route::post("/addCustomer",[CustomerControllerAPI::class,"addCustomer"]);
Route::get("/getCustomer/{customer_id?}",[CustomerControllerAPI::class,"getCustomer"]);
Route::put("/updateCustomer",[CustomerControllerAPI::class,"updateCustomer"]);
Route::delete("/deleteCustomer/{customer_id}",[CustomerControllerAPI::class,"deleteCustomer"]);

Route::get("/getCustomers",[IndexController::class,"index"]);
Route::get("/getServices",[IndexController::class,"index2"]);

Route::get("/getBookingForCustomer",[BookingController::class,"getBookingForCustomer"]);
Route::get("/getBookingForService",[BookingController::class,"getBookingForService"]);
Route::get("/getBooking",[BookingController::class,"getBookingForCustomer"]);
Route::get("/getAllBooking",[BookingController::class,"BookingDetails"]);

Route::post("/addServicer",[ServiceControllerAPI::class,"addServicer"]);
Route::get("/getServicer/{id?}",[ServiceControllerAPI::class,"getServicer"]);
Route::put("/updateServicer}",[ServiceControllerAPI::class,"updateServicer"]);
Route::delete("/deleteServicer/{id?}",[ServiceControllerAPI::class,"deleteServicer"]);