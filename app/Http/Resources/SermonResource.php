<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class SermonResource extends JsonResource
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
            'sermon_id' => $this->id,
            'service_id' => $this->service_id,
            'speaker' => new SpeakerResource($this->speaker),
            'name' => $this->name,
            'scheduled_datetime' => $this->service->service_datetime,
            'stream_key' => $this->stream_key,
            'status' => $this->getStatus(),
        ];
    }
}
