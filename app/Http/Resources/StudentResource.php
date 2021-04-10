<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'about' => $this->about,
            'email' => $this->user->email,
            'phone_number' => $this->user->phone_number,
            'linkedin_profile_url' => $this->user->linkedin_profile_url,
            'field' => $this->field->name,
            // 'skills' => $this->skills
        ];
    }
}
