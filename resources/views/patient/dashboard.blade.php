@extends('layouts.app')

@section('content')

<!-- Page Content -->
<?php
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use \App\Models\Patient;
//dd(Patient::all());
$patient = Patient::where('user_id',auth()->user()->id)->get();
//dd($patient);
$appointments = Appointment::where('patient_id', $patient[0]->id)->get();

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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('doctor-profile') }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-01.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route('doctor-profile') }}">Dr. Ruby Perrin
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('doctor-profile') }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-02.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route('doctor-profile') }}">Dr. Darren Elder
                                                            <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td>12 Nov 2019 <span class="d-block text-info">8.00 PM</span>
                                                </td>
                                                <td>12 Nov 2019</td>
                                                <td>$250</td>
                                                <td>14 Nov 2019</td>
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('doctor-profile') }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-03.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route('doctor-profile') }}">Dr. Deborah
                                                            Angel
                                                            <span>Cardiology</span></a>
                                                    </h2>
                                                </td>
                                                <td>11 Nov 2019 <span class="d-block text-info">11.00 AM</span>
                                                </td>
                                                <td>10 Nov 2019</td>
                                                <td>$400</td>
                                                <td>13 Nov 2019</td>
                                                <td><span class="badge badge-pill bg-danger-light">Cancelled</span>
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('doctor-profile') }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-04.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route('doctor-profile') }}">Dr. Sofia Brient
                                                            <span>Urology</span></a>
                                                    </h2>
                                                </td>
                                                <td>10 Nov 2019 <span class="d-block text-info">3.00 PM</span>
                                                </td>
                                                <td>10 Nov 2019</td>
                                                <td>$350</td>
                                                <td>12 Nov 2019</td>
                                                <td><span class="badge badge-pill bg-warning-light">Pending</span>
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('doctor-profile') }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-05.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route('doctor-profile') }}">Dr. Marvin
                                                            Campbell
                                                            <span>Ophthalmology</span></a>
                                                    </h2>
                                                </td>
                                                <td>9 Nov 2019 <span class="d-block text-info">7.00 PM</span>
                                                </td>
                                                <td>8 Nov 2019</td>
                                                <td>$75</td>
                                                <td>11 Nov 2019</td>
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('doctor-profile') }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-06.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route('doctor-profile') }}">Dr. Katharine
                                                            Berthold
                                                            <span>Orthopaedics</span></a>
                                                    </h2>
                                                </td>
                                                <td>8 Nov 2019 <span class="d-block text-info">9.00 AM</span>
                                                </td>
                                                <td>6 Nov 2019</td>
                                                <td>$175</td>
                                                <td>10 Nov 2019</td>
                                                <td><span class="badge badge-pill bg-danger-light">Cancelled</span>
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('doctor-profile') }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-07.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route('doctor-profile') }}">Dr. Linda Tobin
                                                            <span>Neurology</span></a>
                                                    </h2>
                                                </td>
                                                <td>8 Nov 2019 <span class="d-block text-info">6.00 PM</span>
                                                </td>
                                                <td>6 Nov 2019</td>
                                                <td>$450</td>
                                                <td>10 Nov 2019</td>
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('doctor-profile') }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-08.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route('doctor-profile') }}">Dr. Paul Richard
                                                            <span>Dermatology</span></a>
                                                    </h2>
                                                </td>
                                                <td>7 Nov 2019 <span class="d-block text-info">9.00 PM</span>
                                                </td>
                                                <td>7 Nov 2019</td>
                                                <td>$275</td>
                                                <td>9 Nov 2019</td>
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('doctor-profile') }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-09.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route('doctor-profile') }}">Dr. John Gibbs
                                                            <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td>6 Nov 2019 <span class="d-block text-info">8.00 PM</span>
                                                </td>
                                                <td>4 Nov 2019</td>
                                                <td>$600</td>
                                                <td>8 Nov 2019</td>
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
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('doctor-profile') }}"
                                                            class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-10.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{ route('doctor-profile') }}">Dr. Olga Barlow
                                                            <span>Dental</span></a>
                                                    </h2>
                                                </td>
                                                <td>5 Nov 2019 <span class="d-block text-info">5.00 PM</span>
                                                </td>
                                                <td>1 Nov 2019</td>
                                                <td>$100</td>
                                                <td>7 Nov 2019</td>
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
