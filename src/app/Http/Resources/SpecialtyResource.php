<?php

namespace App\Http\Resources;

use App\Http\Resources\AssigmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecialtyResource extends JsonResource
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
        ];
    }
}
