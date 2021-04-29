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
                'closing_at' => $this->internship->closing_at->format('F d, Y'),
            ],
            'student' => [
                'id' => $this->student->id,
                'user_id' => $this->student->user->id,
                'name' => $this->student->user->name,
                'email' => $this->student->user->email,
                'phone_number' => $this->student->user->phone_number,
                'image' => $this->student->user->image,
                'about' => $this->student->about,
            ],
            'company' => [
                'id' => $this->company->id,
                'name' => $this->company->user->name,
                'city' => $this->company->city->name
            ],
            'created_at' => $this->created_at->format('F d, Y'),
        ];
        
        return $data;
    }
}
