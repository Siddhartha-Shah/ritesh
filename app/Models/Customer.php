<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey="customer_id";
    protected $fillable = [
        'customer_photo'
    ];
    public function service(){
        return $this->belongsTo(Service::class);
    }
}
