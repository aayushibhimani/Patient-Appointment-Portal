@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                <!-- Search Filter -->
                <div class="card search-filter">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Search Filter</h4>
                    </div>
                    <div class="card-body">
                        <div class="filter-widget">
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" placeholder="Select Date">
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4>Gender</h4>
                            <div class="button-group filter-button-group">
  <button class="btn btn-outline-secondary" data-filter="*">All</button>
  <button class="btn btn-outline-secondary" data-filter=".Male">Male</button>
  <button class="btn btn-outline-secondary" data-filter=".Female">Female</button>
</div>
                        </div>
                        <div class="filter-widget">
                            <h4>Select Specialist</h4>
                            <div class="button-group filter-button-group">
  <button class="btn btn-outline-secondary btn-block btn-sm" data-filter="*">All</button>
  <button class="btn btn-outline-secondary btn-block btn-sm" data-filter=".Urology">Urology</button>
  <button class="btn btn-outline-secondary btn-block btn-sm" data-filter=".ENT">ENT</button>
  <button class="btn btn-outline-secondary btn-block btn-sm" data-filter=".Cancer">Cancer</button>
  <button class="btn btn-outline-secondary btn-block btn-sm" data-filter=".Dentist">Dentist</button>
  <button class="btn btn-outline-secondary btn-block btn-sm" data-filter=".Opthalmologist">Opthalmologist</button>
</div>                            
                        </div>                        
                    </div>
                </div>
                <!-- /Search Filter -->

            </div>

            <div class="col-md-12 col-lg-8 col-xl-9 doctor-container">

                <!-- Doctor Widget -->
                @for($t=0;$t<$total;$t++) <div class="card doctor-card {{$doctors[$t]->gender}}  {{ str_replace(',',' ',$doctors[$t]->specialization) }}">  
                    <div class="card-body">
                        <div class="doctor-widget">
                            <div class="doc-info-left">
                                <div class="doctor-img">
                                    <a href="doctor-profile.html">
                                        @if($doctors[$t]->profile_pic)
                                        <img src="{{asset('images/uploads/doctors/'. $doctors[$t]->profile_pic)}}"
                                            class="img-fluid" alt="Doctor Image">
                                        @else
                                        <img src="{{asset('images/uploads/doctors/user.png')}}" class="img-fluid"
                                            alt="Doctor Image">
                                        @endif
                                    </a>
                                </div>
                                <div class="doc-info-cont">
                                    <h4 class="doc-name"><a href="doctor-profile.html">Dr. {{$users[$t]->name}}</a></h4>
                                    <p class="doc-speciality">{{$doctors[$t]->education_degree}}</p>
                                    <h6 class="doctor-email">{{$users[$t]->email}}</h6>
                                    <h5 class="doc-department">
                                        @if($doctors[$t]->specialization)
                                        <img src="assets/img/specialities/specialities-05.png" class="img-fluid"
                                            alt="Speciality">{{$doctors[$t]->specialization}}
                                        @endif
                                    </h5>
                                    <div class="clinic-details">
                                        @if($doctors[$t]->clinic_address)
                                        <p class="doc-location"><i class="fas fa-map-marker-alt"></i>
                                            {{$doctors[$t]->clinic_address}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="doc-info-right">
                                <div class="clini-infos">
                                    <ul>
                                        <li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i
                                                class="fas fa-info-circle" data-toggle="tooltip"
                                                title="Lorem Ipsum"></i></li>
                                    </ul>
                                </div>
                                <div class="clinic-booking">
                                    {{--                                    {{dd($users[$t]->id)}}--}}
                                    <!-- <a class="view-pro-btn" href="doctor-profile.html">View Profile</a> -->
                                    <a class="apt-btn" href="{{route('booking', $users[$t]->id)}}">Book Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endfor
            <!-- /Doctor Widget -->            
        </div>
    </div>

</div>

</div>
<!-- /Page Content -->

<script>

</script>
@endsection