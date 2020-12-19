@extends('layouts.app')

@section('content')


<!-- Page Content -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div><br />
@endif
<form action="{{route('doctor-store-settings')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        {{--    {{dd($doc)}}--}}
        {{--    @foreach($doc as $doc)--}}
        {{--        {{dd($d)}}--}}
        {{--    @endforeach--}}
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    @include('layouts.doctor-sidebar')
                    <!-- /Profile Sidebar -->

                </div>
                <div class="col-md-7 col-lg-8 col-xl-9">

                    <!-- Basic Information -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Information</h4>
                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{asset('images/uploads/doctors/'. $doctor->profile_pic)}}"
                                                    alt="User Image">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" name="profile_pic" required>
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                    2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ucwords(Auth::user()->name)}}" class="form-control"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" value="{{Auth::user()->email}}" class="form-control"
                                            readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" value="{{Auth::user()->mobile_no}}" readonly
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control select" required name="gender"
                                            value="{{$doctor->gender}}">
                                            {{--                                        <option>Select</option>--}}
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-0">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dob" required class="form-control"
                                            value="{{$doctor->dob}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Basic Information -->

                    <!-- Clinic Info -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Clinic Info</h4>
                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Clinic Name</label>
                                        <input type="text" name="clinic_name" required class="form-control"
                                            value="{{$doctor->clinic_name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telephone Number</label>
                                        <input type="tel" name="clinic_no" required class="form-control"
                                            value="{{$doctor->clinic_no}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Clinic Address</label>
                                        <input type="text" name="clinic_address" required class="form-control"
                                            value="{{$doctor->clinic_address}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Clinic Info -->



                    <!-- Services and Specialization -->
                    <div class="card services-card">
                        <div class="card-body">
                            <h4 class="card-title">Specialization</h4>
                            <div class="form-group mb-0">
                                <label>Specialization </label>
                                <input class="input-tags form-control" type="text" data-role="tagsinput"
                                    placeholder="Enter Specialization" name="specialization" required id="specialist"
                                    value="{{$doctor->specialization}}">
                                <small class="form-text text-muted">Note : Type & Press enter to add new
                                    specialization</small>
                            </div>
                        </div>
                    </div>
                    <!-- /Services and Specialization -->

                    <!-- Education -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Education</h4>
                            <div class="education-info">
                                <div class="row form-row education-cont">
                                    <div class="col-12 col-md-10 col-lg-11">
                                        <div class="row form-row">
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Degree</label>
                                                    <input type="text" name="education_degree" class="form-control"
                                                        value="{{$doctor->education_degree}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>College/Institute</label>
                                                    <input type="text" name="education_college" class="form-control"
                                                        value="{{$doctor->education_college}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Year of Completion</label>
                                                    <input type="date" name="year_of_completion" class="form-control"
                                                        value="{{$doctor->year_of_completion}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /Education -->

                    <!-- Experience -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Experience</h4>
                            <div class="experience-info">
                                <div class="row form-row experience-cont">
                                    <div class="col-12 col-md-10 col-lg-11">
                                        <div class="row form-row">
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Hospital Name</label>
                                                    <input type="text" name="hospital_name" class="form-control"
                                                        value="{{$doctor->hospital_name}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>From</label>
                                                    <input type="date" name="start_date" class="form-control"
                                                        value="{{$doctor->start_date}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>To</label>
                                                    <input type="date" name="end_date" class="form-control"
                                                        value="{{$doctor->end_date}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <input type="text" name="destination" class="form-control"
                                                        value="{{$doctor->destination}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Registrations -->
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Registrations</h4>
                                    <div class="registrations-info">
                                        <div class="row form-row reg-cont">
                                            <div class="col-12 col-md-5">
                                                <div class="form-group">
                                                    <label>Registrations</label>
                                                    <input type="text" name="registration_name" class="form-control"
                                                        value="{{$doctor->registration_name}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-5">
                                                <div class="form-group">
                                                    <label>Year</label>
                                                    <input type="text" name="registration_year" class="form-control"
                                                        value="{{$doctor->registration_year}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-more">
                                        <a href="javascript:void(0);" class="add-reg"><i class="fa fa-plus-circle"></i>
                                            Add More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Registrations -->

                            <div class="submit-section submit-btn-bottom">
                                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
</form>
<!-- /Page Content -->

@endsection