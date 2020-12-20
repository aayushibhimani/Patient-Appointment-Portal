
@extends('layouts.app')

@section('content')


    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="booking-doc-info">
                                <a href="doctor-profile.html" class="booking-doc-img">
                                    <img src="{{asset('images/uploads/doctors/'.$doctor->profile_pic)}}" alt="User Image">
                                </a>
                                <div class="booking-info">
                                    <h4><a href="#">Dr. {{ucwords($user->name)}}</a></h4>
                                    <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i>
                                        {{ucwords($doctor->clinic_address)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Schedule Widget -->
                    <div class="card booking-schedule schedule-widget">

                        <?php


                        $spots = ['Sunday'=>[], 'Monday'=>[], 'Tuesday'=>[], 'Wednesday'=>[], 'Thursday'=>[],'Friday'=>[], 'Saturday'=>[]];
                        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday','Friday', 'Saturday'];

                        for($t=0;$t<$total;$t++) {
                            switch(array_search($schedules[$t]->day, $days)){
                                case 0:
                                    $spots['Sunday'][] = $schedules[$t];
                                    break;
                                case 1:
                                    $spots['Monday'][] = $schedules[$t];
                                    break;
                                case 2:
                                    $spots['Tuesday'][] = $schedules[$t];
                                    break;
                                case 3:
                                    $spots['Wednesday'][] = $schedules[$t];
                                    break;
                                case 4:
                                    $spots['Thursday'][] = $schedules[$t];
                                    break;
                                case 5:
                                    $spots['Friday'][] = $schedules[$t];
                                    break;
                                case 6:
                                    $spots['Saturday'][] = $schedules[$t];
                                    break;
                            }
                        }

                        $rows = max(count($spots['Sunday']),count($spots['Monday']),count($spots['Tuesday']),count($spots['Wednesday']),count($spots['Thursday']),count($spots['Friday']),count($spots['Saturday']));


                        ?>

                        <table class="table text-center table-borderless">
                            <thead>
                            <tr style="border:1px solid slategray">
                                <?php foreach($days as $day){ ?>
                                <td><?php echo $day ?></td>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for($i=0;$i<$rows;$i++){ ?>
                            <tr>
                                <?php foreach($days as $day){ ?>
                                <td>
                                    <?php if(array_key_exists($i, $spots[$day])){?>
                                    <button class="btn btn-danger btn-sm" style="font-size:14px;" type="button" data-toggle="modal" data-target="#spot_<?php echo $spots[$day][$i]->id  ?>">
                                        <?php echo $spots[$day][$i]->start_time.' - '.$spots[$day][$i]->end_time ?>
                                    </button>
                                    <?php } ?>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- /Schedule Widget -->

                    <!-- Submit Section -->
                <!-- <div class="submit-section proceed-btn text-right">
                    <a href="{{route('checkout')}}" class="btn btn-primary submit-btn">Proceed to Pay</a>
                </div> -->
                    <!-- /Submit Section -->

                </div>
            </div>
        </div>

    </div>

    <!-- /Add Time Slot Modal -->


    <?php for($t=0;$t<$total;$t++) { ?>
    <!-- Modal -->
    <div class="modal fade" id="spot_<?php echo $schedules[$t]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('storeBooking')}}" method="POST">
                        @csrf
                        <h5>Do you want to book this spot?</h5>
                        <div><b>Appointment ID:</b> #PAT00<?php print_r($schedules[$t]->id); ?></div>
                        <label><b>TIMING:  </b></label>
                        <input name="appointment_slot" value="<?php echo $schedules[$t]->start_time.' - '.$schedules[$t]->end_time ?>" /><br>
                    {{--          <label><B>STATUS: </B> </label>--}}
                    {{--          <input name="status" value="Pending" />--}}

                </div>
                <div class="modal-footer">


                    {{--      <input type="hidden" name="schedule_id" value="<?php print_r($schedules[$t]->id); ?>">--}}
                    <input type="hidden" name="doctor_id" value="<?php print_r($doctor->id); ?>">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
@endsection
