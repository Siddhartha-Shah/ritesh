<?php

namespace App\Http\Resources;

use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->booking_id,
            'customer' => Customer::find($this->customer_id),
            'service' => Service::find($this->service_id),
            'action' => $this->action,
        ];
    }
}
