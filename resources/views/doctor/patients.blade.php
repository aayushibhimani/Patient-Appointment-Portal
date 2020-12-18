@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                <!-- Profile Sidebar -->
                @include('layouts.doctor-sidebar')
                <!-- /Profile Sidebar -->

            </div>
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row row-grid">
                    @foreach($users as $u)
                    @if($u->role == 'Patient')
                    @foreach($patients as $p)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card widget-profile pat-widget-profile">
                            <div class="card-body">
                                <div class="pro-widget-content">
                                    <div class="profile-info-widget">
                                        <a href="{{asset('./images/uploads/patients/'.$p->profile_pic)}}"
                                            class="booking-doc-img">
                                            <img src="{{asset('./images/uploads/patients/'.$p->profile_pic)}}"
                                                alt="User Image">
                                        </a>
                                        <div class="profile-det-info">
                                            <h3>{{ucwords($u->name)}}</h3>

                                            <div class="patient-details">
                                                <h5 class="mb-0"><i class="fas fa-birthday-cake"></i>
                                                    {{date('d-m-Y', strtotime($p->dob))}}</h5>
                                                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{$p->address}}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="patient-info">
                                    <ul>
                                        <li>Phone <span>{{$u->mobile_no}}</span></li>
                                        <li>Blood Group <span>{{$p->blood_group}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    @endsection