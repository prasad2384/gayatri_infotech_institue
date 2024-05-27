@extends('student.dashboardheader')
<?php
$count = 1;

use Carbon\Carbon;

?>
<!-- use Illuminate\Support\Carbon; -->
@section('content')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card w-100">
      <div class="card-body p-4">
        @if(Session::has('message'))
        <script>
          toast('success', '{{session("message")}}');
        </script>
        @endif
        <h5 class="card-title fw-semibold mb-4">Enrolled Course Table</h5>
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="table-responsive">
            <table class="table table-bordered text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr class="text-center">
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Sr No</h6>
                  </th>
                  <!-- <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Category Name</h6>
                  </th> -->
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Course Name </h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Duration</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Total Fee</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Status</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Batch Time</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Start Date</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">End Date</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($applied_courses as $dt)
                <tr>
                  <td class="border-bottom-0 text-center">
                    <h6 class="fw-semibold mb-0">{{$count}}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{$dt->course_name}}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{$dt->course_duration}}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{$dt->total_fees}}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{$dt->status}}</h6>
                  </td>
                  <td class="border-bottom-0">
                    @if($dt->batch_time!=0)
                    <h6 class="fw-semibold mb-1">{{$dt->batch_time}}</h6>
                    @else
                    <h6 class="fw-semibold mb-1">No Batch Time is Available</h6>
                  </td>
                  @endif
                  @php 
                  $count++;
                  @endphp
                  @if($dt->active_date)
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{$dt->active_date}}</h6>
                  </td>
                  @else
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1 blink btn btn-sm btn-warning" style="color:black;font-weight:bolder;font-size:16px">
                      Inactive
                    </h6>
                  </td>
                  @endif
                  @if($dt->active_date)
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">
                      <?php $count_months = preg_replace('/[^0-9]/', '', $dt->course_duration);
                      // use Illuminate\Support\Carbon;
                      $start_date = Carbon::parse($dt->active_date);
                      $end_date = $start_date->addMonths($count_months)->format('Y-m-d');
                      echo $end_date;
                      ?>
                    </h6>
                  </td>
                  @else
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1 blink btn btn-sm btn-warning" style="color:black;font-weight:bolder;font-size:16px">
                      Inactive
                    </h6>
                  </td>
                  @endif
                  
                  <!-- <td class="border-bottom-0">
                    <form action="/appliedcoursedelete/{{$dt->id}}" method="post">
                      @csrf
                      @method('Delete')
                      <button type="submit" class="btn btn-sm btn-danger " style="background-color: red; border:none;outline:none;">Delete</button>
                    </form>
                  </td> -->
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    // $('.blinking').hide();
    function blink_text() {
      $('.blink').fadeOut(500);
      $('.blink').fadeIn(500);
    }
    setInterval(blink_text, 1000);
  });
</script>
@endsection