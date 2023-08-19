<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $primaryKey="booking_id";

    public function customer(){
        return $this->hasMany('App\Models\Customer','customer_id','customer_id');
    }

    public function service(){
        return $this->hasMany('App\Models\Service','service_id','service_id');
    }

}
