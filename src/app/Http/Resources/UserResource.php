<?php

namespace App\Http\Resources;

use App\Http\Resources\AssigmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'zipcode' => $this->zip_code,
            'colorPair' => $this->colorPair,
            'gtArray' => AssigmentResource::collection($this->assigmentsOperator),
        ];
    }
}