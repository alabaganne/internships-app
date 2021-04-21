<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InternshipApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) // will be used by students
    {
        return [
            'id' => $this->id,
            'internship' => [
                'id' => $this->id,
                'title' => $this->internship->title,
                'closing_at' => $this->internship->closing_at->toFormattedDateString(),
                'company' => $this->internship->company->user->name,
                'field' => $this->internship->field->name,
                'city' => $this->internship->company->city->name,
                'remote' => $this->internship->remote,
            ],
            'status' => $this->status,
            'created_at' => $this->created_at->format('F d, Y')
        ];
    }
}
