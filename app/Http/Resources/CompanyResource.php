<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'name' => $this->user->name,
            'email' => $this->user->email,
            'phone_number' => $this->user->phone_number,
            'created_at' => $this->user->created_at,
            'website' => $this->website,
            'about' => $this->about,
            'created_at' => $this->user->created_at->toFormattedDateString()
        ];
    }
}
