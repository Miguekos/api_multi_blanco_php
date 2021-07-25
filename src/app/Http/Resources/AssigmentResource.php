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

        if (!is_null($this->start)) {            
            $start = new Carbon($this->start);
            $start = $start->toRfc7231String();
        }
        else{
            $start = $this->start;
        }

        if (!is_null($this->end)) {            
            $end = new Carbon($this->end);
            $end = $end->toRfc7231String();
        }
        else{
            $end = $this->end;
        }

        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'comentario' => $this->description,
            'start' => $start,
            'end' => $end,
        ];
    }
}
