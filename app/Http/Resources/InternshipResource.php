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

        if($this->companySupervisor)
            $data['company_supervisor'] = [
                'id' => $this->companySupervisor->id,
                'name' => $this->companySupervisor->user->name,
                'email' => $this->companySupervisor->user->email,
                'phone_number' => $this->companySupervisor->user->phone_number,
                'linkedin_profile_url' => $this->companySupervisor->user->linkedin_profile_url,
            ];

        $user = auth()->user();
        if($user->isStudent()) {
            $data['liked'] = $user->userable->likes->contains($this->id);
        }

        return $data;
    }
}
