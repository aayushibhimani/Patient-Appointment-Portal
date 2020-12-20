@extends('layouts.app')

@section('content')

<!-- Page Content -->
<?php
    use Illuminate\Support\Facades\Auth;
    use App\Models\Appointment;
    use \App\Models\Patient;
    use \App\Models\Doctor;
    use \App\Models\User;

    $doctor_details = [];
    $user_details = [];
    $patient = Patient::where('user_id',auth()->user()->id)->get();
    $appointments = Appointment::where('patient_id', $patient[0]->id)->get();


    $doc_ids = Appointment::select('doctor_id')->where('patient_id',$patient[0]->id)->get();
    foreach($doc_ids as $doc_id){
        $doctors = Doctor::whereIn('id',$doc_id)->get();
        array_push($doctor_details,$doctors);
        $user_ids = Doctor::select('user_id')->where('id',2)->get();
        $user_names = User::where('id',$doctors[0]->user_id)->pluck('name');
        array_push($user_details,$user_names);
    }
    $total = count($user_details);

    // dd($user_details[0][0]);
    // $doctors = Doctor::whereIn('id',$doc_ids)->get();

    // $users = User::whereIn('id',$user_ids)->get();
    // dd($appointments[0]);

    ?>
<div class="content">
    <div class="container-fluid">

        <div class="row">

            <!-- Profile Sidebar -->
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                @include('layouts.patient-sidebar')
            </div>
            <!-- /Profile Sidebar -->

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body pt-0">
                        <h3 class="my-4">Appointments</h3>
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Doctor</th>
                                                <th>Specialization</th>
                                                <th>Appointment Slot</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($t=0;$t<$total;$t++) <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar avatar-sm mr-2">

                                                            <img class="avatar-img rounded-circle"
                                                                src="{{asset('images/uploads/doctors/'. $doctor_details[$t][0]->profile_pic)}}"
                                                                src="" >
                                                        </a>
                                                        <a href="{{ route('doctor-profile') }}">Dr.
                                                            {{$user_details[$t][0]}}

                                                    </h2>
                                                </td>
                                                <td>
                                                    {{$doctor_details[$t][0]->specialization}}
                                                </td>
                                                <td>{{$appointments[$t]->appointment_slot}}</td>
                                                <td><span
                                                        class="badge badge-pill bg-success-light">{{$appointments[$t]->status}}</span>
                                                </td>
                                                <td>
                                                    @if($appointments[$t]->status == 'Confirmed')
                                                    <div class="submit-section proceed-btn text-right">
                                                        <a href="{{route('checkout', $appointments[$t]->id)}}"
                                                            class="btn btn-primary submit-btn">Proceed to Pay</a>
                                                    </div>
                                                    @elseif($appointments[$t]->status == 'Pending')
                                                    <div class="submit-section proceed-btn text-right">
                                                        <button disabled class="btn btn-primary submit-btn">Proceed to
                                                            Pay</button>
                                                    </div>
                                                    @endif

                                                </td>
                                                </tr>
                                                @endfor()
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->
@endsection