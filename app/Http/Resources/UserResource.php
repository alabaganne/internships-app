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
            'created_at' => $this->user->created_at
        ];
        if(Str::contains($this->user->userable_type, 'Company')) {
            $data['website'] = $this->website;
        }
        if(Str::contains($this->user->userable_type, 'Student')) {
            // 
        }
        
        if($this->about) {
            $data['about'] = $this->about;
        }
        if($this->field) {
            $data['field_id'] = $this->field->id;
            $data['field'] = $this->field->name;
        }
        if($this->city) {
            $data['city_id'] = $this->city->id;
            $data['city'] = $this->city->name;
        }

        return $data;
    }
}
