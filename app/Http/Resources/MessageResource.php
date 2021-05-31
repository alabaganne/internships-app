<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
			'id' => $this->id,
			'from_id' => $this->from_id,
			'to_id' => $this->to_id,
			'text' => $this->text,
			'read_at' => $this->read_at,
			'created_at' => $this->created_at->calendar(),
		];
    }
}
