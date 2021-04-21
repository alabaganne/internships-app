<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversitySupervisorRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->university_supervisor) {
            $user_id = $this->university_supervisor->user->id;
        } else {
            $user_id = "";
        }
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user_id,
            'phone_number' => 'nullable|unique:users,phone_number,' . $user_id,
            'field_id' => 'required',
        ];
    }
}
