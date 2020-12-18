    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{asset('images/uploads/patients/'.$patient->profile_pic)}}" alt="User Image">
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
                    <!-- <li>
                        <a href="favourites.html">
                            <i class="fas fa-bookmark"></i>
                            <span>Favourites</span>
                        </a>
                    </li>
                    <li>
                        <a href="dependent.html">
                            <i class="fas fa-users"></i>
                            <span>Dependent</span>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <i class="fas fa-comments"></i>
                            <span>Message</span>
                            <small class="unread-msg">23</small>
                        </a>
                    </li> -->
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
                        <a href="index.html">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
