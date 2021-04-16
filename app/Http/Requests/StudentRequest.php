<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $student = \App\Models\Student::find($this->id);
        if($student) {
            $user_id = $student->user->id;
        } else {
            $user_id = NULL;
        }
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user_id,
            'phone_number' => 'nullable|unique:users,phone_number,' . $user_id,
            'field_id' => 'required',
            'city_id' => 'nullable',
            'about' => 'nullable'
        ];
    }
}
