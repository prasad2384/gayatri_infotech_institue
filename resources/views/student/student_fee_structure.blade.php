@extends('student.dashboardheader')
@section("content")
@php
$count=1;
$total=0;
@endphp
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card w-100">
      <div class="card-body p-4">
        @if(Session::has('message'))
        <script>
          toast('success', '{{session("message")}}');
        </script>
        @endif
        <!-- <h5 class="card-title fw-semibold mb-4">Course Table</h5> -->
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="table-responsive">
            <table class="table table-bordered text-nowrap mb-0 align-middle" >
              @if($paid_fees!='')
              <thead class="text-dark fs-4">
                <tr class="text-center">
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Sr No</h6>
                  </th>
                  <!-- <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Category Name</h6>
                  </th> -->
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Course Name</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Duration</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Total Fee</h6>
                  </th>
                  <!-- <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Status</h6>
                  </th> -->
                </tr>
              </thead>
              <tbody>
                @foreach($data as $dt)
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
                </tr>
                @php
                $count++;
                $total=$total+$dt->total_fees;
                @endphp
                @endforeach
                <tr>
                    <td colspan="3"><h6 class="fw-semibold mb-0 text-center">Total Fees</h6></td>
                    <td><h6 class="fw-semibold mb-0 text-center">{{$total}}</h6></td>
                </tr>
                <tr class="bg-success">
                    <td colspan="3"><h6 class="fw-semibold mb-0 text-center">You Paid Fees</h6></td>
                    <td><h6 class="fw-semibold mb-0 text-center">{{$paid_fees->paid_fees}}</h6></td>
                </tr>
                <tr class="bg-danger">
                    <td colspan="3"><h6 class="fw-semibold mb-0 text-center">Remaining Fees</h6></td>
                    <td><h6 class="fw-semibold mb-0 text-center">{{$total-$paid_fees->paid_fees}}</h6></td>
                </tr>
              </tbody>
              @else
               <h1>No Courses</h1>
               @endif
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection