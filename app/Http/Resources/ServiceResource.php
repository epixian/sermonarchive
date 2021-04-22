<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'service_id' => $this->id,
            'name' => $this->name,
            'service_date' => $this->service_date,
            'sermon' => new SermonResource($this->sermon),
        ];
    }
}
