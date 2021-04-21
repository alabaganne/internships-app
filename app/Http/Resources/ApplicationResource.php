<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
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
            'cover_letter' => $this->cover_letter,
            'message' => $this->message,
            'attachments' => $this->attachments,
            'status' => $this->status,
            'internship' => [
                'id' => $this->internship->id,
                'title' => $this->internship->title,
                'field' => $this->internship->field->name,
            ],
            'created_at' => $this->created_at,
        ];

        $user = auth()->user();
        if($user->isCompany()) {
            $data['student'] = [
                'id' => $this->student->id,
                'name' => $this->student->user->name,
                'email' => $this->student->user->email,
            ];
        }
        if($user->isStudent()) {
            $data['internship']['company'] = $this->internship->company->user->name;
        }
        
        return $data;
    }
}
