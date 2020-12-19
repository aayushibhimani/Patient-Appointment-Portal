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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Schedule Timings</h4>
                                <div class="profile-box">
                                    <div class="row mb-3">
                                        <div class="col-lg-4">
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
                                                                    data-filter=".Sunday" href="#slot_Sunday">Sunday</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    data-filter=".Monday" href="#slot_Monday">Monday</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    data-filter=".Tuesday"
                                                                    href="#slot_Tuesday">Tuesday</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    data-filter=".Wednesday"
                                                                    href="#slot_Wednesday">Wednesday</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    data-filter=".Thursday"
                                                                    href="#slot_Thursday">Thursday</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    data-filter=".Friday" href="#slot_Friday">Friday</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    data-filter=".Saturday"
                                                                    href="#slot_Saturday">Saturday</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                    <!-- /Schedule Nav -->

                                                </div>
                                                <!-- /Schedule Header -->

                                                <!-- Schedule Content -->
                                                <div class="tab-content schedule-cont">
                                                    <!-- ALl Slot -->
                                                    <div id="all" class="tab-pane fade">
                                                        <h4 class="card-title d-flex justify-content-between">
                                                            <span>Time Slots</span>
                                                        </h4>
                                                        <?php
                                                            $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                                            foreach($days as $day){
                                                        ?>

                                                        <div class="doc-times d-block my-4">

                                                            <h4 class="card-title">
                                                                <span>{{$day}}</span>
                                                            </h4>
                                                            @foreach ($schedules as $s)
                                                            @if($s->day == $day)
                                                            <div class="doc-slot-list d-inline-block py-0 px-2">
                                                                {{$s->start_time}} - {{$s->end_time}}
                                                                <form style="display:inline-block"
                                                                    action="{{ route('destroy', $s->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('DELETE')
                                                                    <button
                                                                        class="delete_schedule btn text-white-50 btn-sm">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            @endif
                                                            @endforeach

                                                        </div>
                                                        <?php } ?>

                                                    </div>
                                                    <!-- /ALl Slot -->
                                                    <?php
                                                    $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                                    foreach($days as $day){?>
                                                    <!-- Monday Slot -->
                                                    <div id="slot_<?php echo $day; ?>" class="tab-pane fade">

                                                        <h4 class="card-title d-flex justify-content-between">
                                                            <span>Time Slots</span>
                                                        </h4>
                                                        @foreach ($schedules as $s)
                                                        <div class="doc-times d-inline-block">
                                                            @if($s->day == $day)
                                                            <div class="doc-slot-list d-inline-block py-0 px-2">
                                                                {{$s->start_time}}
                                                                {{$s->end_time}}
                                                                <form style="display:inline-block"
                                                                    action="{{ route('destroy', $s->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('DELETE')
                                                                    <button
                                                                        class="delete_schedule btn text-white-50 btn-sm">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <!-- /Monday Slot -->
                                                    <?php                                                       
                                                    }
                                                    ?>
                                                </div>


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
                                            <?php
                                                $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                                foreach($days as $day){
                                            ?>
                                            <option value="<?php echo $day ?>"><?php echo $day ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Start Time</label>
                                            <select class="form-control" name="start_time[]">
                                                <option>-</option>
                                                <?php

$times = ['9.00 am', '9.30 am','10.00 am', '10.30 am','11.00 am', '11.30 am','12.00 pm', '12.30 pm','1.00 pm', '1.30 pm','2.00 pm', '2.30 pm','3.00 pm', '3.30 pm','4.00 pm', '4.30 pm','5.00 pm', '5.30 pm','6.00 pm', '6.30 pm','7.00 pm'];
foreach($times as $time){
    if($time == '7.00 pm') continue;
?>
                                                <option value="<?php echo $time ?>"><?php echo $time ?></option>

                                                <?php    
}
?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <select class="form-control" name="end_time[]">
                                                <option>-</option>
                                                <?php

$times = ['9.00 am', '9.30 am','10.00 am', '10.30 am','11.00 am', '11.30 am','12.00 pm', '12.30 pm','1.00 pm', '1.30 pm','2.00 pm', '2.30 pm','3.00 pm', '3.30 pm','4.00 pm', '4.30 pm','5.00 pm', '5.30 pm','6.00 pm', '6.30 pm','7.00 pm'];
foreach($times as $time){
    if($time == '9.00 am') continue;
?>
                                                <option value="<?php echo $time ?>"><?php echo $time ?></option>

                                                <?php    
}
?>
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
@endsection