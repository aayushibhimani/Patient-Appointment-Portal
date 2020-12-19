@extends('layouts.app')

@section('content')

<!-- Page Content -->
<?php
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use \App\Models\Patient;
use \App\Models\Doctor;
use \App\Models\User;
//dd(Patient::all());

$patient = Patient::where('user_id',auth()->user()->id)->get();
//dd($patient);
$appointments = Appointment::where('patient_id', $patient[0]->id)->get();
$doc_app = Appointment::select('doctor_id')->where('patient_id', $patient[0]->id)->get();
//$appts = Appointment::select('doctor_id')->whereIn('')->get();
//$doctors = Doctor::whereIn('id', $appts)->get();
//$users_id = Doctor::select('user_id')->whereIn('user_id', $doctors)->get();
//dd($users_id);
//$users = User::whereIn('id', $users_id)->get();
//dd($users);
////$doc = Doctor::where('user_id', $appts)->get();
//
//$user_ids = Doctor::select('user_id')->get();






    $doc_ids = Doctor::select('id')->whereIn('id', $doc_app)->get();
//    dd($doc_ids);








//$user = User::whereIn('id', $doc)->get();
$total = count($appointments);
//dd($total);
//dd($doctors[0]);
//dd($appointments);
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
                                                <th>Appt Date</th>
                                                <th>Booking Date</th>
                                                <th>Amount</th>
                                                <th>Follow Up</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=0; $i<$total; $i++)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('doctor-profile') }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="#"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route('doctor-profile') }}">
                                                            <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td>14 Nov 2019 <span class="d-block text-info">10.00 AM</span>
                                                </td>
                                                <td>12 Nov 2019</td>
                                                <td>$160</td>
                                                <td>16 Nov 2019</td>
                                                <td><span class="badge badge-pill bg-success-light">Confirm</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-sm bg-primary-light">
                                                            <i class="fas fa-print"></i> Print
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="far fa-eye"></i> View
                                                        </a>
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
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->
@endsection
