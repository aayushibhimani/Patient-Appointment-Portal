<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dob' => 'required | date | before:10 years ago',
            'blood_group'=>'required',
            'profile_pic' => 'mimes:jpg,jpeg,png | max: 99999',
            'address'=>'required'
        ];
    }
}
