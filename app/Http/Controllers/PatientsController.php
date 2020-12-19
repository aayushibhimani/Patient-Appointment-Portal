<?php

namespace App\Http\Controllers;
use App\Http\Requests\Patient\UpdateProfileRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patient/dashboard');
    }
    public function viewInvoice()
    {
        return view('patient/view-invoice');
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
    public function booking()
    {
        return view('patient/booking');
    }
    public function checkout()
    {
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
        return view('patient/checkout',compact('intent'));
    }



    public function afterPayment()
    {
        route('payment-success');
        }


    


    public function paymentSuccess()
    {
        return view('patient/payment-success');
    }

    public function search()
    {
        return view('patient/search');
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
}
