@extends('layouts.app')

@section('content')

<!-- Page Content -->
<?php
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
$patient_details = [];
$user_details = [];
$doctor = Doctor::where('user_id', auth()->user()->id)->get();
$appointments = Appointment::where('doctor_id', $doctor[0]->id)->get();

//$user_names = User::where('id',$doctors[0]->user_id)->pluck('name');

$pat_ids = Appointment::select('doctor_id')->where('doctor_id',$doctor[0]->id)->get();
foreach($pat_ids as $pat_id){
//    dd($pat_id);
    $t = $pat_id->doctor_id;
    $patients = Patient::whereIn('id',$pat_ids)->get();
    array_push($patient_details,$patients);
    $user_ids = Patient::select('user_id')->where('id',$pat_id->doctor_id)->get();
//    dd($user_ids);
//    $user_ids= Patient::where('id', $pat_id);
    $user_names = User::where('id',$patients[0]->user_id)->pluck('name');
    array_push($user_details,$user_names);
}
//dd($user_ids);
$total = count($user_details);
?>
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                <!-- Profile Sidebar -->
                @include('layouts.doctor-sidebar')
                <!-- /Profile Sidebar -->

            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card dash-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar1">
                                                <div class="circle-graph1" data-percent="75">
                                                    <img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Total Patient</h6>
                                                <h3>1500</h3>
                                                <p class="text-muted">Till Today</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-6">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar2">
                                                <div class="circle-graph2" data-percent="65">
                                                    <img src="assets/img/icon-02.png" class="img-fluid" alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Today Patient</h6>
                                                <h3>160</h3>
                                                <p class="text-muted">06, Nov 2019</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h4 style="text-align: center; font-size: x-large">Patient Appointments</h4>
                        <!-- /Appointment Tab -->

                        <div class="tab-content">

                            <!-- Upcoming Appointment Tab -->
                            <div class="tab-pane show active" id="upcoming-appointments">
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Patient Name</th>
                                                        <th>Appt ID</th>

                                                        <th>Slot</th>

                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for($t=0;$t<$total;$t++) <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="#" class="avatar avatar-sm mr-2"><img
                                                                        class="avatar-img rounded-circle"
                                                                        src="{{asset('images/uploads/doctors/'. $patient_details[$t][0]->profile_pic)}}"
                                                                        alt="User Image"> {{$user_details[$t][0]}}</a>
                                                                <a href="patient-profile.html">
                                                                    <span></span></a>
                                                            </h2>
                                                        </td>
                                                        <td>#PAT00{{$appointments[$t]->id}}</td>

                                                        <td><span
                                                                class="d-block text-info">{{$appointments[$t]->appointment_slot}}</span>
                                                        </td>

                                                        <td>
                                                            <div class="table-action">

                                                                <form
                                                                    action="{{route('accept', $appointments[$t]->id)}}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="status"
                                                                        value="{{$appointments[$t]->id}}">
                                                                    @if($appointments[$t]->status == 'Pending')
                                                                    <button class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </button>
                                                                    @elseif($appointments[$t]->status == 'Confirmed')
                                                                    <button class="btn btn-sm bg-success-light"
                                                                        disabled>
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </button>
                                                                    @endif


                                                                </form>

                                                                <form
                                                                    action="{{route('reject', $appointments[$t]->id)}}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <input type="hidden" name="status"
                                                                        value="{{$appointments[$t]->id}}">
                                                                    @if($appointments[$t]->status == 'Pending')
                                                                    <button class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Reject
                                                                    </button>
                                                                    @elseif($appointments[$t]->status == 'Confirmed')
                                                                    <button class="btn btn-sm bg-danger-light" disabled>
                                                                        <i class="fas fa-times"></i> Reject
                                                                    </button>
                                                                    </button>
                                                                    @endif



                                                                </form>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                        @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Upcoming Appointment Tab -->

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