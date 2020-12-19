<?php use App\Models\Doctor;
$doctor = Doctor::where('user_id', Auth::user()->id)->first();
?>
<!-- Profile Sidebar -->
<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">
                <img src="{{asset('images/uploads/doctors/'. $doctor->profile_pic)}}" alt="User Image">
            </a>
            <div class="profile-det-info">
                <h3>Dr. {{ucwords(Auth::user()->name)}}</h3>
                <div class="patient-details">
                    <h5 class="mb-0">{{$doctor->education_degree}} {{$doctor->specialization}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor-appointments') }}">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor-patients') }}">
                        <i class="fas fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('schedule-timings') }}">
                        <i class="fas fa-hourglass-start"></i>
                        <span>Schedule Timings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor-profile-settings') }}">
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('change-password') }}">
                        <i class="fas fa-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /Profile Sidebar -->