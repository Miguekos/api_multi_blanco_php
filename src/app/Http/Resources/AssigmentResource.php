<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AssigmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'registration_id' => $this->registration_id,
            'status' => $this->status->name,
            'specialty' => $this->specialty,
            'processor' => $this->processor,
            'customer' => $this->customer,
            'address' => $this->address,
            'zip_code' => $this->zip_code,
            'phone' => $this->phone,
            'description' => $this->description,
            'comment' => $this->comment,
            'date' => $this->date,
            'start' => $this->start,
            'end' => $this->end,
        ];
    }
}
