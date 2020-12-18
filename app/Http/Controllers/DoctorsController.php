<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use App\Http\Requests\Schedule\CreateScheduleRequest;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
        $doctor_details = Doctor::where('user_id',auth()->user()->id)->get();
        $doctor = $doctor_details[0];
        // dd($doctor);
        $user = auth()->user();
        return view('doctor/profile')->with('user', $user)->with('doctor', $doctor);

    }
    public function patientProfile()
    {
    }
    public function scheduleTimings()
    {
        //will display the schedule page
        $schedules = Schedule::where('user_id', auth()->user()->id)->get();
        //$schedules = $schedules_details[1];
        return view('doctor/schedule-timings')->with('schedules', $schedules);
    }
    public function createScheduleTimings(Request $request)
    {

        //used to create new schedule timimgs
        dd($request->all());
        $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        $doctor = Auth::user()->id;
        //dd($doctor);
        $schedule = new Schedule();
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->user_id = $doctor;
        $schedule->save();
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
    public function store(UpdateDoctorRequest $request)
    {
        $doctor_deatils=Doctor::where('user_id',auth()->user()->id)->get();
        $doctor = $doctor_deatils[0];
        $data = $request->only(['dob','gender', 'clinic_name','clinic_address','clinic_no','specialization','education_college',
        'year_of_completion','education_degree','hospital_name','start_date','end_date','destination','registration_name',
        'registration_year']);
         $profile_pic = $request->file('profile_pic');
         $imageName =  time().'.'.$request->profile_pic->extension();
        // dd($imageName);
        // $imageName =  time().'.'.$request->profile_pic->extension();
        $profile_pic->move(public_path('images/uploads/doctors'), $imageName);
        $data['profile_pic'] = $imageName;

        $doctor->update($data);

        return redirect(route('doctor-profile-settings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
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
    public function destroy($id)
    {
        Schedule::destroy($id);
        return redirect()->back();
    }
}
