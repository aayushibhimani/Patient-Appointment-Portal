@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Search</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">2245 matches found for : Dentist In Bangalore</h2>
            </div>
            <div class="col-md-4 col-12 d-md-block d-none">
                <div class="sort-by">
                    <span class="sort-title">Sort by</span>
                    <span class="sortby-fliter">
                        <select class="select">
                            <option>Select</option>
                            <option class="sorting">Rating</option>
                            <option class="sorting">Popular</option>
                            <option class="sorting">Latest</option>
                            <option class="sorting">Free</option>
                        </select>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

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
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type" checked>
                                    <span class="checkmark"></span> Male Doctor
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="gender_type">
                                    <span class="checkmark"></span> Female Doctor
                                </label>
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4>Select Specialist</h4>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist" checked>
                                    <span class="checkmark"></span> Urology
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist" checked>
                                    <span class="checkmark"></span> Neurology
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist">
                                    <span class="checkmark"></span> Dentist
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist">
                                    <span class="checkmark"></span> Orthopedic
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist">
                                    <span class="checkmark"></span> Cardiologist
                                </label>
                            </div>
                            <div>
                                <label class="custom_check">
                                    <input type="checkbox" name="select_specialist">
                                    <span class="checkmark"></span> Cardiologist
                                </label>
                            </div>
                        </div>
                        <div class="btn-search">
                            <button type="button" class="btn btn-block">Search</button>
                        </div>
                    </div>
                </div>
                <!-- /Search Filter -->

            </div>

            <div class="col-md-12 col-lg-8 col-xl-9">

                <!-- Doctor Widget -->
                @for($t=0;$t<$total;$t++) <div class="card">
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

            <div class="load-more text-center">
                <a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>
            </div>
        </div>
    </div>

</div>

</div>
<!-- /Page Content -->
@endsection