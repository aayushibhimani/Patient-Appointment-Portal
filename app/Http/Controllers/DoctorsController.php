<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doctor/dashboard');
    }

//    Return Views

    public function appointments()
    {
        return view('doctor/appointments');
    }
    public function patients()
    {
        return view('doctor/patients');
    }
    public function profileSettings()
    {
        return view('doctor/profile');
    }
    public function patientProfile()
    {
        return view('doctor/patient-profile');
    }
    public function scheduleTimings()
    {
        return view('doctor/schedule-timings');
    }


//     End of return Views

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        $request -> validate([
            'dob' => 'required | date | before:10 years ago',
            'gender' => 'required',
            'profile_pic' => 'required | mimes:jpg,jpeg,png | max: 99999',
            'clinic_name' => 'required | max:140',
            'clinic_address' => 'required | max:255',
            'clinic_no' => 'required | regex:/[0-9]{8}/',
            'specialization' => 'required | max:70',
            'education_college' => 'required | max:100',
            'year_of_completion' => 'required | date',
            'education_degree' => 'required | max: 30',
            'hospital_name' => 'required | max:50',
            'start_date' => 'required ',
            'end_date' => 'required',
            'destination' => 'required | max: 50',
            'registration_name' => 'required | max: 50',
            'registration_year' => 'required | ',
        ]);
        $user_id = Auth::user()->id;

        $doctor = new Doctor();

        $imageName =  time().'.'.$request->profile_pic->extension();
        $request->profile_pic->move(public_path('images/uploads/doctors'), $imageName);
        //store in db
        $doctor->profile_pic = $imageName;

        $doctor->user_id = $user_id;
        $doctor->dob = $request->dob;
        $doctor->gender = $request->gender;
        $doctor->clinic_name = $request->clinic_name;
        $doctor->clinic_address = $request->clinic_address;
        $doctor->clinic_no = $request->clinic_no;
        $doctor->specialization = $request->specialization;
        $doctor->education_college = $request->education_college;
        $doctor->year_of_completion = $request->year_of_completion;
        $doctor->education_degree = $request->education_degree;
        $doctor->hospital_name = $request->hospital_name;
        $doctor->start_date = $request->start_date;
        $doctor->end_date = $request->end_date;
        $doctor->destination = $request->destination;
        $doctor->registration_name = $request->registration_name;
        $doctor->registration_year = $request->registration_year;
        $doctor->save();

        return view('doctor/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        $doc = Doctor::all();
        $username = Auth::user()->name;
        $email = Auth::user()->email;
        return view('doctor/profile')->with('username', $username)->with('email', $email)->with('doc', $doc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
