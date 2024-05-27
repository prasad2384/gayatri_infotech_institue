@extends('admin.header')
@section('content')
@php
$page_name="Add Batch";
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
        <a href="../../batch/create" class="btn btn-warning btn-sm float-end">Add Batch</a>
        <h5 class="card-title fw-semibold mb-4">Batch Table</h5>
        <div class="col-lg-12 align-items-stretch">
          <div class="table-responsive">
            <table class="table table-bordered text-nowrap w-100 mb-0 align-middle" width="100%">
              <thead class="text-dark fs-4">
                <tr class="text-center">
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Sr No</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Course Name</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Batch Time</h6>
                  </th>
                  <th class="border-bottom-0" colspan="2">
                    <h6 class="fw-semibold mb-0">Actions</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($course_batch as $dt)
                <tr>
                  <td class="border-bottom-0 text-center">
                    <h6 class="fw-semibold mb-0">{{$dt->id}}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{$dt->course_name}}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{$dt->batch_time}}</h6>
                  </td>
                  <!-- <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$dt->course_duration}}</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$dt->total_fees}}</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$dt->course_mode}}</h6>
                        </td>
                        <td class="border-bottom-0">
                            <img src="../assets/images/{{$dt->course_image}}" height="100px" alt="">
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$dt->course_status}}</h6>
                        </td> -->
                  <td class="border-bottom-0">
                    <form action="{{route('batch.destroy',$dt->id)}}" method="post">
                      @csrf
                      @method('Delete')
                      <button type="submit" class="btn btn-sm btn-danger " style="background-color: red; border:none;outline:none;">Delete</button>
                    </form>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-warning  mx-2" style="  border:none;outline:none;"><a href="{{route('batch.edit',$dt->id)}}" class="text-white">Update</a></button>
                  </td>
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
@endsection