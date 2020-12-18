<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
            'gender' => 'required',
            'profile_pic' => ' mimes:jpg,jpeg,png | max: 99999',
            'clinic_name' => 'required | max:140',
            'clinic_address' => 'required | max:255',
            'clinic_no' => 'required | regex:/[0-9]{8}/',
            'specialization' => 'required | max:100',
             'education_college' => 'max:100',
             'year_of_completion' => 'date',
             'education_degree' => ' max: 300',
             'hospital_name' => 'max:50',
             'start_date' => 'date ',
             'end_date' => 'date',
             'destination' => 'max: 50',
             'registration_name' => 'max: 50',
             //'registration_year' => 'date',
        ];
    }
}
