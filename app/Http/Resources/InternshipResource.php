<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InternshipResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'company' => [
                'id' => $this->company->id,
                'name' => $this->company->user->name,
                'email' => $this->company->user->email,
                'phone_number' => $this->company->user->phone_number,
                'website' => $this->company->website,
                'about' => $this->company->about,
                'city' => $this->company->city
            ],
            'field' => [
                'id' => $this->field->id,
                'name' => $this->field->name,
            ],
            'remote' => $this->remote,
            'attachments' => $this->attachments,
            'closing_at' => $this->closing_at->format('F d, Y'),
            'created_at' => $this->created_at->diffForHumans(),
        ];
        if($this->company_supervisor)
            $data['company_supervisor'] = [
                'id' => $this->company_supervisor->id,
                'name' => $this->company_supervisor->user->name,
                'email' => $this->company_supervisor->user->email,
                'phone_number' => $this->company_supervisor->user->phone_number,
                'linkedin_profile_url' => $this->company_supervisor->user->linkedin_profile_url,
            ];
        return $data;
    }
}
