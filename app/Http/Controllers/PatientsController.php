<?php

namespace App\Http\Controllers;
use App\Http\Requests\Patient\UpdateProfileRequest;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

use Razorpay\Api\Api;
use Session;
use DB;


class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//dd($appointments);
        return view('patient/dashboard');
    }
    public function profileSettings()
    {

        $patient_details = Patient::where('user_id',auth()->user()->id)->get();
        $patient = $patient_details[0];
        $user = auth()->user();
        return view('patient/profile',compact(['patient','user']));

    }
    public function doctorProfile()
    {
        return view('patient/doctor-profile');
    }
    public function booking($id)
    {
        $doctor_details = Doctor::where('id', $id)->get();
        $doctor = $doctor_details[0];
        $user = User::where('id', $doctor->user_id)->get();
        $user = $user[0];
        $schedules = Schedule::where('doctor_id', $id)->get();
        $total = count($schedules);
        return view('patient/booking')->with('user',$user)->with('doctor', $doctor)->with('schedules', $schedules)->with('total', $total);
    }



    public function checkout($id)
    {
        $appt = Appointment::where('id', $id)->get();
        $appt = $appt[0];
        $doctor = Doctor::where('id', $appt->doctor_id)->get();
        $doctor = $doctor[0];
        $user = User::where('id', $doctor->user_id)->get();
        $user = $user[0];
        $patient = Patient::where('id', $appt->patient_id)->get();
        $patient = $patient[0];
                $user_two = User::where('id', $patient->user_id)->get();
        $user_two = $user_two[0];        

        \Stripe\Stripe::setApiKey('sk_test_51I06bJHOJcfRNvD19LpfaClE4mehNa33spMbNmRSbT48CtY5tgysRZrT1emrUVtUzAYHjD0Vlid3OuQc6GmWp1TT00H9hf7Uw1');
        $amount = 160;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'INR',
            'description' => 'Payment From Patient',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;
        return view('patient/checkout',compact('intent', 'appt', 'doctor','patient', 'user', 'user_two'));
    }



    public function afterPayment()
    {
        return view('patient/payment-success');
    }
    public function paymentSuccess()
    {
        return view('patient/payment-success');
    }

    public function viewInvoice()
    {
        return view('view-invoice');
    }

    public function search()
    {
        $doctors = DB::table('doctors')->get();        
        $user_ids = Doctor::select('user_id')->get();
        $users = User::whereIn('id',$user_ids)->get();
        $total = count($users);
        // dd($total);
        return view('patient/search',compact(['users','doctors','total']));
    }
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
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateProfileRequest $request)
    {
        //Used to update and store patient profile details
        // dd($request->all());
        $patient_details = Patient::where('user_id',auth()->user()->id)->get();
        $patient = $patient_details[0];
        // dd($patient);
        // $image = $request->file('image')->store('patients');
        $data = $request->only(['dob','blood_group', 'address','profile_pic']);
        $profile_pic = $request->file('profile_pic');
        $imageName =  time().'.'.$request->profile_pic->extension();
        $profile_pic->move(public_path('images/uploads/patients'), $imageName);
        $data['profile_pic'] = $imageName;
        $patient->update($data);
        return redirect(route('patient-profile-settings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function storeBooking(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'appointment_slot' => 'required'
        ]);
        $patient = Patient::where('user_id', auth()->user()->id)->get();
        $pid = $patient[0]->id;
//        dd($pid);
//        $d = Doctor::all();
//        $did = $d->id;

        $apt = new Appointment();
        $apt->appointment_slot = $request->appointment_slot;
        $apt->patient_id = $pid;
        $apt->doctor_id = $request->doctor_id;
        $apt->status = 'Pending';
        $apt->save();

        return view('patient/dashboard');
    }
}