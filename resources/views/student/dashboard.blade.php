@extends('student.dashboardheader')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col">
        <!-- Category -->
        <div class="card overflow-hidden border border-warning shadow">
          <div class="card-body p-3">
            <h5 class="card-title mb-9 fw-semibold">Applied Courses</h5>
            <div class="row align-items-center">
              <div class="col-8">
                <h4 class="fw-semibold mb-3">{{$apply_course_count}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        @if($apply_course_count>0)
        <!-- Faculty -->
        <div class="card overflow-hidden border border-warning shadow">
          <div class="card-body p-3">
            <h5 class="card-title mb-9 fw-semibold">Active Courses</h5>
            <div class="row align-items-center">
              <div class="col-8">
                <h4 class="fw-semibold mb-3">{{$active_course_count}}</h4>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>

      <div class="col">
        @if($active_course_count>0)
        <div class="card overflow-hidden border border-warning shadow">
          <div class="card-body p-3">
            <h5 class="card-title mb-9 fw-semibold">Total Fees</h5>
            <div class="row align-items-center">
              <div class="col-8">
                <h4 class="fw-semibold mb-3">{{$sum_fees}} ₹</h4>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>

      <div class="col">
        @if($active_course_count>0)
        <div class="card overflow-hidden border border-warning shadow">
          <div class="card-body p-3">
            <h5 class="card-title mb-9 fw-semibold">Paid Fees</h5>
            <div class="row align-items-center">
              <div class="col-8">
                <h4 class="fw-semibold mb-3">{{$paid_fees->paid_fees}} ₹</h4>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>

      <div class="col">
        <!-- Product -->
        @if($active_course_count>0 && $sum_fees!=$paid_fees->paid_fees)
        <div class="card overflow-hidden border border-warning shadow">
          <div class="card-body p-3">
            <h5 class="card-title mb-9 fw-semibold">Remaing Fees</h5>
            <div class="row align-items-center">
              <div class="col-8">
                <h4 class="fw-semibold mb-3">{{$sum_fees-$paid_fees->paid_fees}} ₹</h4>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
      <!-- <div class="col">
                    <div class="card overflow-hidden border border-primary shadow">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Total Feedbacks</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3">12</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card overflow-hidden border border-primary shadow">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Total Enquiries</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3">7</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
    </div>
  </div>
@endsection