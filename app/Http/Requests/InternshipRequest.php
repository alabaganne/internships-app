<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InternshipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages() {
        return [
            'field_id.required' => 'You must select a field of studies.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'field_id' => 'required',
            'company_supervisor_id' => 'nullable',
            'closing_at' => 'required|date',
            'remote' => 'boolean',
            'attachments' => 'nullable',
        ];
    }
}
