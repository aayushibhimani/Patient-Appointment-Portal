@extends('layouts.app')

@section('content')


<!-- Page Content -->
<div class="content success-page-cont">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-lg-6">

                <!-- Success Card -->
                <div class="card success-card">
                    <div class="card-body">
                        <div class="success-cont">
                            <i class="fas fa-check"></i>
                            <h3>Appointment booked Successfully!</h3>
                            <p>Appointment booked with <strong>Dr. Rishi Gupta</strong><br> on <strong>20 Dec 2020
                                    </strong></p>
                            <a href="{{route('patient-view-invoice')}}" class="btn btn-primary view-inv-btn">View Invoice</a>
                        </div>
                    </div>
                </div>
                <!-- /Success Card -->

            </div>
        </div>

    </div>
</div>
<!-- /Page Content -->
@endsection