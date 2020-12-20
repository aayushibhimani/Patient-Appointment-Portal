<?php use App\Models\Patient;
$patient = Patient::where('user_id', Auth::user()->id)->first();
?>
<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">
            @if($patient->profile_pic)
                <img src="{{asset('images/uploads/patients/'.$patient->profile_pic)}}" alt="User Image">
            @else
                <img src="{{asset('images/uploads/patients/user.png')}}" alt="User Image">
            @endif
            </a>
            <div class="profile-det-info">
                <h3>{{ucwords(Auth::user()->name)}}</h3>
                <div class="patient-details">
                    <h5><i class="fas fa-birthday-cake"></i> {{date('d-m-Y', strtotime($patient->dob))}}</h5>
                    <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{$patient->address}}</h5>
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
                    <a href="{{ route('search') }}">
                        <i class="fas fa-search"></i>
                        <span>Search</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('patient-profile-settings') }}">
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
