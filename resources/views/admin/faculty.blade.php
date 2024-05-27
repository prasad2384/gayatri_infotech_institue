@extends('admin.header')
@section('content')
@php
$page_name="Add Faculty";
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
        <a href="../../faculty/create" class="btn btn-warning btn-sm float-end">Add Faculty</a>
        <h5 class="card-title fw-semibold mb-4">Faculty Table</h5>
        <div class="col-lg-12 align-items-stretch">
          <div class="table-responsive">
          <table class="table table-bordered text-nowrap mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr class="text-center">
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Sr.No</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Course Name</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Faculty Name</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Phone No</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Image</h6>
              </th>
              <th class="border-bottom-0" colspan="2">
                <h6 class="fw-semibold mb-0">Actions</h6>
              </th>

            </tr>
          </thead>
          <tbody>
            @foreach($course_faculty as $dt)
            <tr>
              <td class="border-bottom-0 text-center">
                <h6 class="fw-semibold mb-0">{{$dt->id}}</h6>
              </td>

              <td class="border-bottom-0">
                <h6 class="fw-semibold mb-1">{{$dt->course_name}}</h6>
              </td>
              <td class="border-bottom-0">
                <h6 class="fw-semibold mb-1">{{$dt->faculty_name}}</h6>
              </td>
              <td class="border-bottom-0">
                <h6 class="fw-semibold mb-1">{{$dt->faculty_mobileno}}</h6>
              </td>

              <td class="border-bottom-0">
                <img src="../assets/images/{{$dt->faculty_image}}" height="80px" alt="">
              </td>
              <!-- <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$dt->course_status}}</h6>
                        </td> -->
              <td class="border-bottom-0">
                <form action="{{route('faculty.destroy',$dt->id)}}" method="post">
                  @csrf
                  @method('Delete')
                  <button type="submit" class="btn btn-sm btn-danger " style="background-color: red; border:none;outline:none;">Delete</button>
                </form>
              </td>
              <td>
                <button class="btn btn-sm btn-warning  mx-2" style="  border:none;outline:none;"><a href="{{route('faculty.edit',$dt->id)}}" class="text-white">Update</a></button>
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