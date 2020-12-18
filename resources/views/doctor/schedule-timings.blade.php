@extends('layouts.app')

@section('content')
<?php use App\Models\Schedule;
    $schedules = Schedule::where('user_id','=', Auth::user()->id)->get();
    //dd($schedules);
            //
    ?>


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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Schedule Timings</h4>
                                <div class="profile-box">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Timing Slot Duration</label>
                                                <select class="select form-control">
                                                    <option>-</option>
                                                    <option>15 mins</option>
                                                    <option selected="selected">30 mins</option>
                                                    <option>45 mins</option>
                                                    <option>1 Hour</option>
                                                </select>
                                            </div>
                                            <a class="edit-link" data-toggle="modal" href="#add_time_slot"><i
                                                    class="fa fa-plus-circle"></i> Add Slot</a>
                                            <br />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card schedule-widget mb-0">
                                                <!-- Schedule Header -->
                                                <div class="schedule-header">
                                                    <!-- Schedule Nav -->
                                                    <div class="schedule-nav">
                                                        <ul class="nav nav-tabs nav-justified">

                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" data-filter="*"
                                                                    href="#all">All</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    data-filter=".sunday" href="#slot_sunday">Sunday</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab"
                                                                    data-filter=".monday" href="#slot_monday">Monday</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    data-filter=".tuesday"
                                                                    href="#slot_tuesday">Tuesday</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    data-filter=".wednesday"
                                                                    href="#slot_wednesday">Wednesday</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    data-filter=".thursday"
                                                                    href="#slot_thursday">Thursday</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    data-filter=".friday" href="#slot_friday">Friday</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    data-filter=".saturday"
                                                                    href="#slot_saturday">Saturday</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                    <!-- /Schedule Nav -->

                                                </div>
                                                <!-- /Schedule Header -->

                                                <!-- Schedule Content -->
                                                {{--                                                {{dd($schedules['day'] == 'Friday')}}--}}


                                                <div class="tab-content schedule-cont">
                                                    {{--                                                            @foreach($schedules as $s)--}}
                                                    {{--                                                                {{dd($schedule)}}--}}
                                                    {{--                                                            @endforeach--}}
                                                    {{--                                                            <!-- all slots -->--}}
                                                    {{--   --}}
                                                    {{--                                                            <div id="all" class="tab-pane fade">--}}
                                                    {{--                                                                <h4 class="card-title d-flex justify-content-between">--}}
                                                    {{--                                                                    <span>Time Slots</span>--}}

                                                    {{--                                                                </h4>--}}
                                                    {{--                                                                <div class="doc-times">--}}
                                                    {{--                                                                    <div class="doc-slot-list">--}}
                                                    {{--                                                                        {{$s->start_time}}
                                                    - {{$s->end_time}}--}}
                                                    {{--                                                                        <a href="javascript:void(0)" class="delete_schedule">--}}
                                                    {{--                                                                            <i class="fa fa-times"></i>--}}
                                                    {{--                                                                        </a>--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--                                                                </div>--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                            <!-- /all slots -->--}}

                                                    <!-- Sunday Slot -->
                                                    <div id="slot_sunday" class="tab-pane fade">

                                                        @foreach ($schedules as $s)
                                                        <div class="doc-times">
                                                            @if($s->day == 'Sunday')
                                                            <h4 class="card-title d-flex justify-content-between">
                                                                <span>{{$s->day}}</span>

                                                            </h4>
                                                            <div class="doc-slot-list">

                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                <form action="{{ route('destroy', $s->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('DELETE')
                                                                    <button class="delete_schedule">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            @elseif($s->day == 'Monday')
                                                            <h4 class="card-title d-flex justify-content-between">
                                                                <span>{{$s->day}}</span>

                                                            </h4>
                                                            <div class="doc-slot-list">
                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                <form action="{{ route('destroy', $s->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('DELETE')
                                                                    <button class="delete_schedule">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            @elseif($s->day == 'Tuesday')
                                                            <h4 class="card-title d-flex justify-content-between">
                                                                <span>{{$s->day}}</span>

                                                            </h4>
                                                            <div class="doc-slot-list">
                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                <form action="{{ route('destroy', $s->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('DELETE')
                                                                    <button class="delete_schedule">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            @elseif($s->day == 'Wednesday')
                                                            <h4 class="card-title d-flex justify-content-between">
                                                                <span>{{$s->day}}</span>

                                                            </h4>
                                                            <div class="doc-slot-list">
                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                <form action="{{ route('destroy', $s->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('DELETE')
                                                                    <button class="delete_schedule">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            @elseif($s->day == 'Thursday')
                                                            <h4 class="card-title d-flex justify-content-between">
                                                                <span>{{$s->day}}</span>

                                                            </h4>
                                                            <div class="doc-slot-list">
                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                <form action="{{ route('destroy', $s->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('DELETE')
                                                                    <button class="delete_schedule">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            @elseif($s->day == 'Friday')
                                                            <h4 class="card-title d-flex justify-content-between">
                                                                <span>{{$s->day}}</span>

                                                            </h4>
                                                            <div class="doc-slot-list">
                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                <form action="{{ route('destroy', $s->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('DELETE')
                                                                    <button class="delete_schedule">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            @elseif($s->day == 'Saturday')
                                                            <h4 class="card-title d-flex justify-content-between">
                                                                <span>{{$s->day}}</span>

                                                            </h4>
                                                            <div class="doc-slot-list">
                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                <form action="{{ route('destroy', $s->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('DELETE')
                                                                    <button class="delete_schedule">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            @else
                                                            <p class="text-muted mb-0">Not Available</p>
                                                            @endif
                                                        </div>
                                                        @endforeach

                                                    </div>
                                                    <!-- /Sunday Slot -->

                                                    {{--																<!-- Monday Slot -->--}}

                                                    {{--                                                                <div id="slot_monday" class="tab-pane fade">--}}
                                                    {{--                                                                    <h4 class="card-title d-flex justify-content-between">--}}
                                                    {{--                                                                        <span>Time Slots</span>--}}
                                                    {{--                                                                        --}}{{--																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>--}}
                                                    {{--                                                                    </h4>--}}


                                                    {{--                                                                    <div class="doc-times">--}}
                                                    {{--                                                                        @if($s->day == 'Monday')--}}
                                                    {{--                                                                            <div class="doc-slot-list">--}}
                                                    {{--                                                                                {{$s->start_time}}
                                                    - {{$s->end_time}}--}}
                                                    {{--                                                                                <a href="javascript:void(0)" class="delete_schedule">--}}
                                                    {{--                                                                                    <i class="fa fa-times"></i>--}}
                                                    {{--                                                                                </a>--}}
                                                    {{--                                                                            </div>--}}
                                                    {{--                                                                        @else--}}
                                                    {{--                                                                            <p class="text-muted mb-0">Not Available</p>--}}
                                                    {{--                                                                        @endif--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--                                                                </div>--}}
                                                    {{--																<!-- /Monday Slot -->--}}

                                                    {{--																<!-- Tuesday Slot -->--}}
                                                    {{--																<div id="slot_tuesday" class="tab-pane fade">--}}
                                                    {{--																	<h4 class="card-title d-flex justify-content-between">--}}
                                                    {{--																		<span>Time Slots</span>--}}
                                                    {{--																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>--}}
                                                    {{--																	</h4>--}}
                                                    {{--                                                                    <div class="doc-times">--}}
                                                    {{--                                                                        @if($s->day == 'Tuesday')--}}
                                                    {{--                                                                            <div class="doc-slot-list">--}}
                                                    {{--                                                                                {{$s->start_time}}
                                                    - {{$s->end_time}}--}}
                                                    {{--                                                                                <a href="javascript:void(0)" class="delete_schedule">--}}
                                                    {{--                                                                                    <i class="fa fa-times"></i>--}}
                                                    {{--                                                                                </a>--}}
                                                    {{--                                                                            </div>--}}
                                                    {{--                                                                        @else--}}
                                                    {{--                                                                            <p class="text-muted mb-0">Not Available</p>--}}
                                                    {{--                                                                        @endif--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--																</div>--}}
                                                    {{--																<!-- /Tuesday Slot -->--}}

                                                    {{--																<!-- Wednesday Slot -->--}}
                                                    {{--																<div id="slot_wednesday" class="tab-pane fade">--}}
                                                    {{--																	<h4 class="card-title d-flex justify-content-between">--}}
                                                    {{--																		<span>Time Slots</span>--}}
                                                    {{--																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>--}}
                                                    {{--																	</h4>--}}
                                                    {{--                                                                    <div class="doc-times">--}}
                                                    {{--                                                                        @if($s->day == 'Wednesday')--}}
                                                    {{--                                                                            <div class="doc-slot-list">--}}
                                                    {{--                                                                                {{$s->start_time}}
                                                    - {{$s->end_time}}--}}
                                                    {{--                                                                                <a href="javascript:void(0)" class="delete_schedule">--}}
                                                    {{--                                                                                    <i class="fa fa-times"></i>--}}
                                                    {{--                                                                                </a>--}}
                                                    {{--                                                                            </div>--}}
                                                    {{--                                                                        @else--}}
                                                    {{--                                                                            <p class="text-muted mb-0">Not Available</p>--}}
                                                    {{--                                                                        @endif--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--																</div>--}}
                                                    {{--																<!-- /Wednesday Slot -->--}}

                                                    {{--																<!-- Thursday Slot -->--}}
                                                    {{--																<div id="slot_thursday" class="tab-pane fade">--}}
                                                    {{--																	<h4 class="card-title d-flex justify-content-between">--}}
                                                    {{--																		<span>Time Slots</span>--}}
                                                    {{--																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>--}}
                                                    {{--																	</h4>--}}
                                                    {{--                                                                    <div class="doc-times">--}}
                                                    {{--                                                                        @if($s->day == 'Thursday')--}}
                                                    {{--                                                                            <div class="doc-slot-list">--}}
                                                    {{--                                                                                {{$s->start_time}}
                                                    - {{$s->end_time}}--}}
                                                    {{--                                                                                <a href="javascript:void(0)" class="delete_schedule">--}}
                                                    {{--                                                                                    <i class="fa fa-times"></i>--}}
                                                    {{--                                                                                </a>--}}
                                                    {{--                                                                            </div>--}}
                                                    {{--                                                                        @else--}}
                                                    {{--                                                                            <p class="text-muted mb-0">Not Available</p>--}}
                                                    {{--                                                                        @endif--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--																</div>--}}
                                                    {{--																<!-- /Thursday Slot -->--}}

                                                    {{--																<!-- Friday Slot -->--}}
                                                    {{--																<div id="slot_friday" class="tab-pane fade">--}}
                                                    {{--																	<h4 class="card-title d-flex justify-content-between">--}}
                                                    {{--																		<span>Time Slots</span>--}}
                                                    {{--																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>--}}
                                                    {{--																	</h4>--}}
                                                    {{--                                                                    <div class="doc-times">--}}
                                                    {{--                                                                        @if($s->day == 'Friday')--}}
                                                    {{--                                                                            <div class="doc-slot-list">--}}
                                                    {{--                                                                                {{$s->start_time}}
                                                    - {{$s->end_time}}--}}
                                                    {{--                                                                                <a href="javascript:void(0)" class="delete_schedule">--}}
                                                    {{--                                                                                    <i class="fa fa-times"></i>--}}
                                                    {{--                                                                                </a>--}}
                                                    {{--                                                                            </div>--}}
                                                    {{--                                                                        @else--}}
                                                    {{--                                                                            <p class="text-muted mb-0">Not Available</p>--}}
                                                    {{--                                                                        @endif--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--																</div>--}}
                                                    {{--																<!-- /Friday Slot -->--}}

                                                    {{--																<!-- Saturday Slot -->--}}
                                                    {{--																<div id="slot_saturday" class="tab-pane fade">--}}
                                                    {{--																	<h4 class="card-title d-flex justify-content-between">--}}
                                                    {{--																		<span>Time Slots</span>--}}
                                                    {{--																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>--}}
                                                    {{--																	</h4>--}}
                                                    {{--                                                                    <div class="doc-times">--}}
                                                    {{--                                                                        @if($s->day == 'Saturday')--}}
                                                    {{--                                                                            <div class="doc-slot-list">--}}
                                                    {{--                                                                                {{$s->start_time}}
                                                    - {{$s->end_time}}--}}
                                                    {{--                                                                                <a href="javascript:void(0)" class="delete_schedule">--}}
                                                    {{--                                                                                    <i class="fa fa-times"></i>--}}
                                                    {{--                                                                                </a>--}}
                                                    {{--                                                                            </div>--}}
                                                    {{--                                                                        @else--}}
                                                    {{--                                                                            <p class="text-muted mb-0">Not Available</p>--}}
                                                    {{--                                                                        @endif--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--																</div>--}}
                                                    {{--																<!-- /Saturday Slot -->--}}
                                                    {{--    @endforeach--}}
                                                    {{--															</div>--}}


                                                    <!-- /Schedule Content -->

                                                </div>
                                            </div>
                                        </div>
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
    <!-- Add Time Slot Modal -->
    <div class="modal fade custom-modal" id="add_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Time Slots</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('create-schedule-timings')}}" method="POST">
                        @csrf
                        <div class="hours-info">
                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-md-12 form-group">
                                            <label>Day</label>
                                            <select class="form-control" name="day">
                                                <option>-</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                                <option value="Sunday">Sunday</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <select class="form-control" name="start_time[]">
                                                    <option>-</option>
                                                    <option value="12.00 am">12.00 am</option>
                                                    <option value="12.30 am">12.30 am</option>
                                                    <option value="1.00 am">1.00 am</option>
                                                    <option value="1.30 am">1.30 am</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <select class="form-control" name="end_time[]">
                                                    <option>-</option>
                                                    <option value="12.00 am">12.00 am</option>
                                                    <option value="12.30 am">12.30 am</option>
                                                    <option value="1.00 am">1.00 am</option>
                                                    <option value="1.30 am">1.30 am</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-more mb-3">
                            <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add
                                More</a>
                        </div>
                        <div class="submit-section text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Time Slot Modal -->

    <!-- Edit Time Slot Modal -->
    <div class="modal fade custom-modal" id="edit_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Time Slots</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="hours-info">
                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <select class="form-control">
                                                    <option>-</option>
                                                    <option value="12.00 am" selected>12.00 am</option>
                                                    <option value="12.30 am">12.30 am</option>
                                                    <option value="1.00 am">1.00 am</option>
                                                    <option value="1.30 am">1.30 am</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <select class="form-control">
                                                    <option>-</option>
                                                    <option value="12.00 am">12.00 am</option>
                                                    <option value="12.30 am" selected>12.30 am</option>
                                                    <option value="1.00 am">1.00 am</option>
                                                    <option value="1.30 am">1.30 am</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <select class="form-control">
                                                    <option>-</option>
                                                    <option value="12.00 am">12.00 am</option>
                                                    <option value="12.30 am" selected>12.30 am</option>
                                                    <option value="1.00 am">1.00 am</option>
                                                    <option value="1.30 am">1.30 am</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <select class="form-control">
                                                    <option>-</option>
                                                    <option value="12.00 am">12.00 am</option>
                                                    <option value="12.30 am">12.30 am</option>
                                                    <option value="1.00 am" selected>1.00 am</option>
                                                    <option value="1.30 am">1.30 am</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a
                                        href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
                            </div>

                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <select class="form-control">
                                                    <option>-</option>
                                                    <option value="12.00 am">12.00 am</option>
                                                    <option value="12.30 am">12.30 am</option>
                                                    <option value="1.00 am" selected>1.00 am</option>
                                                    <option value="1.30 am">1.30 am</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <select class="form-control">
						</div>
			<div class="col-md-7 col-lg-8 col-xl-9">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Schedule Timings</h4>
									<div class="profile-box">
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group">
													<label>Timing Slot Duration</label>
													<select class="select form-control">
														<option>-</option>
														<option>15 mins</option>
														<option selected="selected">30 mins</option>
														<option>45 mins</option>
														<option>1 Hour</option>
													</select>
												</div>
                                                <a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                       <br/>
											</div>
										</div>
									<div class="row">
										<div class="col-md-12">
											<div class="card schedule-widget mb-0">
												<!-- Schedule Header -->
												<div class="schedule-header">
													<!-- Schedule Nav -->
														<div class="schedule-nav">
															<ul class="nav nav-tabs nav-justified">

                                                                <li class="nav-item">
                                                                 <a class="nav-link" data-toggle="tab" data-filter="*" href="#all">All</a>
                                                                 </li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" data-filter=".sunday" href="#slot_sunday">Sunday</a>
																</li>
																<li class="nav-item">
																<a class="nav-link active" data-toggle="tab" data-filter=".monday" href="#slot_monday">Monday</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" data-filter=".tuesday" href="#slot_tuesday">Tuesday</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" data-filter=".wednesday" href="#slot_wednesday">Wednesday</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" data-filter=".thursday" href="#slot_thursday">Thursday</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" data-filter=".friday" href="#slot_friday">Friday</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" data-filter=".saturday" href="#slot_saturday">Saturday</a>
																</li>

																	</ul>
																</div>
																<!-- /Schedule Nav -->

															</div>
															<!-- /Schedule Header -->

															<!-- Schedule Content -->
{{--                                                {{dd($schedules['day'] == 'Friday')}}--}}


															<div class="tab-content schedule-cont">
{{--                                                            @foreach($schedules as $s)--}}
{{--                                                                {{dd($schedule)}}--}}
{{--                                                            @endforeach--}}
{{--                                                            <!-- all slots -->--}}
{{--   --}}
{{--                                                            <div id="all" class="tab-pane fade">--}}
{{--                                                                <h4 class="card-title d-flex justify-content-between">--}}
{{--                                                                    <span>Time Slots</span>--}}

{{--                                                                </h4>--}}
{{--                                                                <div class="doc-times">--}}
{{--                                                                    <div class="doc-slot-list">--}}
{{--                                                                        {{$s->start_time}} - {{$s->end_time}}--}}
{{--                                                                        <a href="javascript:void(0)" class="button btn-danger">--}}
{{--                                                                            <i class="fa fa-times"></i>--}}
{{--                                                                        </a>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <!-- /all slots -->--}}

																<!-- Sunday Slot -->
																<div id="slot_sunday" class="tab-pane fade">

                                                                    @foreach ($schedules as $s)
                                                                    <div class="doc-times">
                                                                        @if($s->day == 'Sunday')
                                                                            <h4 class="card-title d-flex justify-content-between">
                                                                                <span>{{$s->day}}</span>

                                                                            </h4>
                                                                            <div class="doc-slot-list">

                                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                                <form action="{{ route('destroy', $s->id) }}" method="POST">
                                                                                    @csrf @method('DELETE')
                                                                                    <button class="button btn-danger">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        @elseif($s->day == 'Monday')
                                                                            <h4 class="card-title d-flex justify-content-between">
                                                                                <span>{{$s->day}}</span>

                                                                            </h4>
                                                                            <div class="doc-slot-list">
                                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                                <form action="{{ route('destroy', $s->id) }}" method="POST">
                                                                                    @csrf @method('DELETE')
                                                                                    <button class="button btn-danger">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        @elseif($s->day == 'Tuesday')
                                                                            <h4 class="card-title d-flex justify-content-between">
                                                                                <span>{{$s->day}}</span>

                                                                            </h4>
                                                                            <div class="doc-slot-list">
                                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                                <form action="{{ route('destroy', $s->id) }}" method="POST">
                                                                                    @csrf @method('DELETE')
                                                                                    <button class="button btn-danger">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        @elseif($s->day == 'Wednesday')
                                                                            <h4 class="card-title d-flex justify-content-between">
                                                                                <span>{{$s->day}}</span>

                                                                            </h4>
                                                                            <div class="doc-slot-list">
                                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                                <form action="{{ route('destroy', $s->id) }}" method="POST">
                                                                                    @csrf @method('DELETE')
                                                                                    <button class="button btn-danger">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        @elseif($s->day == 'Thursday')
                                                                            <h4 class="card-title d-flex justify-content-between">
                                                                                <span>{{$s->day}}</span>

                                                                            </h4>
                                                                            <div class="doc-slot-list">
                                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                                <form action="{{ route('destroy', $s->id) }}" method="POST">
                                                                                    @csrf @method('DELETE')
                                                                                    <button class="button btn-danger">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        @elseif($s->day == 'Friday')
                                                                            <h4 class="card-title d-flex justify-content-between">
                                                                                <span>{{$s->day}}</span>

                                                                            </h4>
                                                                            <div class="doc-slot-list">
                                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                                <form action="{{ route('destroy', $s->id) }}" method="POST">
                                                                                    @csrf @method('DELETE')
                                                                                    <button class="button btn-danger">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        @elseif($s->day == 'Saturday')
                                                                            <h4 class="card-title d-flex justify-content-between">
                                                                                <span>{{$s->day}}</span>

                                                                            </h4>
                                                                            <div class="doc-slot-list">
                                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                                <form action="{{ route('destroy', $s->id) }}" method="POST">
                                                                                    @csrf @method('DELETE')
                                                                                    <button class="button btn-danger">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        @else
                                                                            <p class="text-muted mb-0">Not Available</p>
                                                                        @endif
                                                                    </div>
                                                                    @endforeach

																</div>
																<!-- /Sunday Slot -->

{{--																<!-- Monday Slot -->--}}

{{--                                                                <div id="slot_monday" class="tab-pane fade">--}}
{{--                                                                    <h4 class="card-title d-flex justify-content-between">--}}
{{--                                                                        <span>Time Slots</span>--}}
{{--                                                                        --}}{{--																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>--}}
{{--                                                                    </h4>--}}


{{--                                                                    <div class="doc-times">--}}
{{--                                                                        @if($s->day == 'Monday')--}}
{{--                                                                            <div class="doc-slot-list">--}}
{{--                                                                                {{$s->start_time}} - {{$s->end_time}}--}}
{{--                                                                                <a href="javascript:void(0)" class="button btn-danger">--}}
{{--                                                                                    <i class="fa fa-times"></i>--}}
{{--                                                                                </a>--}}
{{--                                                                            </div>--}}
{{--                                                                        @else--}}
{{--                                                                            <p class="text-muted mb-0">Not Available</p>--}}
{{--                                                                        @endif--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--																<!-- /Monday Slot -->--}}

{{--																<!-- Tuesday Slot -->--}}
{{--																<div id="slot_tuesday" class="tab-pane fade">--}}
{{--																	<h4 class="card-title d-flex justify-content-between">--}}
{{--																		<span>Time Slots</span>--}}
{{--																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>--}}
{{--																	</h4>--}}
{{--                                                                    <div class="doc-times">--}}
{{--                                                                        @if($s->day == 'Tuesday')--}}
{{--                                                                            <div class="doc-slot-list">--}}
{{--                                                                                {{$s->start_time}} - {{$s->end_time}}--}}
{{--                                                                                <a href="javascript:void(0)" class="button btn-danger">--}}
{{--                                                                                    <i class="fa fa-times"></i>--}}
{{--                                                                                </a>--}}
{{--                                                                            </div>--}}
{{--                                                                        @else--}}
{{--                                                                            <p class="text-muted mb-0">Not Available</p>--}}
{{--                                                                        @endif--}}
{{--                                                                    </div>--}}
{{--																</div>--}}
{{--																<!-- /Tuesday Slot -->--}}

{{--																<!-- Wednesday Slot -->--}}
{{--																<div id="slot_wednesday" class="tab-pane fade">--}}
{{--																	<h4 class="card-title d-flex justify-content-between">--}}
{{--																		<span>Time Slots</span>--}}
{{--																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>--}}
{{--																	</h4>--}}
{{--                                                                    <div class="doc-times">--}}
{{--                                                                        @if($s->day == 'Wednesday')--}}
{{--                                                                            <div class="doc-slot-list">--}}
{{--                                                                                {{$s->start_time}} - {{$s->end_time}}--}}
{{--                                                                                <a href="javascript:void(0)" class="button btn-danger">--}}
{{--                                                                                    <i class="fa fa-times"></i>--}}
{{--                                                                                </a>--}}
{{--                                                                            </div>--}}
{{--                                                                        @else--}}
{{--                                                                            <p class="text-muted mb-0">Not Available</p>--}}
{{--                                                                        @endif--}}
{{--                                                                    </div>--}}
{{--																</div>--}}
{{--																<!-- /Wednesday Slot -->--}}

{{--																<!-- Thursday Slot -->--}}
{{--																<div id="slot_thursday" class="tab-pane fade">--}}
{{--																	<h4 class="card-title d-flex justify-content-between">--}}
{{--																		<span>Time Slots</span>--}}
{{--																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>--}}
{{--																	</h4>--}}
{{--                                                                    <div class="doc-times">--}}
{{--                                                                        @if($s->day == 'Thursday')--}}
{{--                                                                            <div class="doc-slot-list">--}}
{{--                                                                                {{$s->start_time}} - {{$s->end_time}}--}}
{{--                                                                                <a href="javascript:void(0)" class="button btn-danger">--}}
{{--                                                                                    <i class="fa fa-times"></i>--}}
{{--                                                                                </a>--}}
{{--                                                                            </div>--}}
{{--                                                                        @else--}}
{{--                                                                            <p class="text-muted mb-0">Not Available</p>--}}
{{--                                                                        @endif--}}
{{--                                                                    </div>--}}
{{--																</div>--}}
{{--																<!-- /Thursday Slot -->--}}

{{--																<!-- Friday Slot -->--}}
{{--																<div id="slot_friday" class="tab-pane fade">--}}
{{--																	<h4 class="card-title d-flex justify-content-between">--}}
{{--																		<span>Time Slots</span>--}}
{{--																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>--}}
{{--																	</h4>--}}
{{--                                                                    <div class="doc-times">--}}
{{--                                                                        @if($s->day == 'Friday')--}}
{{--                                                                            <div class="doc-slot-list">--}}
{{--                                                                                {{$s->start_time}} - {{$s->end_time}}--}}
{{--                                                                                <a href="javascript:void(0)" class="button btn-danger">--}}
{{--                                                                                    <i class="fa fa-times"></i>--}}
{{--                                                                                </a>--}}
{{--                                                                            </div>--}}
{{--                                                                        @else--}}
{{--                                                                            <p class="text-muted mb-0">Not Available</p>--}}
{{--                                                                        @endif--}}
{{--                                                                    </div>--}}
{{--																</div>--}}
{{--																<!-- /Friday Slot -->--}}

{{--																<!-- Saturday Slot -->--}}
{{--																<div id="slot_saturday" class="tab-pane fade">--}}
{{--																	<h4 class="card-title d-flex justify-content-between">--}}
{{--																		<span>Time Slots</span>--}}
{{--																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>--}}
{{--																	</h4>--}}
{{--                                                                    <div class="doc-times">--}}
{{--                                                                        @if($s->day == 'Saturday')--}}
{{--                                                                            <div class="doc-slot-list">--}}
{{--                                                                                {{$s->start_time}} - {{$s->end_time}}--}}
{{--                                                                                <a href="javascript:void(0)" class="button btn-danger">--}}
{{--                                                                                    <i class="fa fa-times"></i>--}}
{{--                                                                                </a>--}}
{{--                                                                            </div>--}}
{{--                                                                        @else--}}
{{--                                                                            <p class="text-muted mb-0">Not Available</p>--}}
{{--                                                                        @endif--}}
{{--                                                                    </div>--}}
{{--																</div>--}}
{{--																<!-- /Saturday Slot -->--}}
{{--    @endforeach--}}
{{--															</div>--}}


															<!-- /Schedule Content -->

														</div>
													</div>
												</div>
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
			<!-- Add Time Slot Modal -->
		<div class="modal fade custom-modal" id="add_time_slot">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{route('create-schedule-timings')}}" method="POST">
						@csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
                                            <div class="col-md-12 form-group">
                                                <label>Day</label>
                                                <select class="form-control" name="day">
                                                    <option>-</option>
                                                    <option value="12.00 am">12.00 am</option>
                                                    <option value="12.30 am">12.30 am</option>
                                                    <option value="1.00 am">1.00 am</option>
                                                    <option value="1.30 am" selected>1.30 am</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a
                                        href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
                            </div>

                        </div>

                        <div class="add-more mb-3">
                            <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add
                                More</a>
                        </div>
                        <div class="submit-section text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Time Slot Modal -->

    @endsection
