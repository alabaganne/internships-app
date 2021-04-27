<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isAdmin();
    }

    public function messages()
    {
        return [
            'name.unique' => 'A field with that name already exists.'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->field) {
            $field_id = $this->field->id;
        } else {
            $field_id = "";
        }
        return [
            'name' => 'required|unique:fields,name,' . $field_id,
        ];
    }
}
