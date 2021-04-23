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
        /** @var User $user */
        $user = auth()->user();
        $streamTechnician = $user ? $user->hasRole(['stream_technician']) : false;

        return [
            'sermon_id' => $this->id,
            'service_id' => $this->service_id,
            'speaker' => new SpeakerResource($this->speaker),
            'name' => $this->name,
            'scheduled_for' => $this->scheduled_for,
            'stream_key' => $this->stream_key,
            $this->mergeWhen($streamTechnician, [
                'stream_started' => (bool) $this->stream_started,
                'stream_ended' => (bool) $this->stream_ended,
                'recording_done' => (bool) $this->recording_done,
            ]),
        ];
    }
}
