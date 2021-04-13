<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

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
        $data = [
            'id' => $this->id,
            'name' => $this->user->name,
            'username' => $this->user->username,
            'email' => $this->user->email,
            'phone_number' => $this->user->phone_number,
            'linkedin_profile_url' => $this->user->linkedin_profile_url,
            'image' => $this->user->image,
            'created_at' => $this->user->created_at->toFormattedDateString()
        ];
        if(Str::contains($this->user->userable_type, 'Company')) {
            $data['website'] = $this->website;
            $data['about'] = $this->about;
            $data['city'] = $this->city->name;
        }
        if(Str::contains($this->user->userable_type, 'Student')) {
            $data['about'] = $this->about;
            $data['field'] = $this->field->name;
        }
        if(Str::contains($this->user->userable_type, 'UniversitySupervisor')) {
            $data['field'] = $this->field->name;
        }

        return $data;
    }
}
