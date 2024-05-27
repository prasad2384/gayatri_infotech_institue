@extends('admin.header')
@section('content')


<!-- table start -->
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card w-100">
      <div class="card-body p-4">
        @if(Session::has('message'))
        <script>
          toast('success', '{{session("message")}}');
        </script>
        @endif
        <a href="../../course/create" class="btn btn-warning btn-sm float-end">Add Courses</a>
        <h5 class="card-title fw-semibold mb-4">Course Table</h5>
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="table-responsive">
            <table class="table table-bordered text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr class="text-center">
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Course_Id</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Category Name</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Course Name</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Duration</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Total Fee</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Mode</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Image</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Short Description</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Long Description</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Status</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Delete</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Update</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($category_courses as $dt)
                <tr>
                  <td class="border-bottom-0 text-center">
                    <h6 class="fw-semibold mb-0">{{$dt->id}}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{$dt->category_name}}</h6>
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
                    <h6 class="fw-semibold mb-1">{{$dt->course_mode}}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <img src="../assets/images/{{$dt->course_image}}" height="50px" width="100px" alt="">
                  </td>
                  <td class="border-bottom-0">
                      <textarea name="" id="" cols="30" rows="4" readonly>{{$dt->shortdesc}}</textarea>
                  </td>
                  <td>
                    <textarea name="" id="" cols="30" rows="4" readonly>{{!! $dt->longdesc!!}}</textarea>
                    <h6 class="border-bottom-0"></h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{$dt->course_status}}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <form action="{{route('course.destroy',$dt->id)}}" method="post">
                      @csrf
                      @method('Delete')
                      <button type="submit" class="btn btn-sm btn-danger " style="background-color: red; border:none;outline:none;">Delete</button>
                    </form>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-warning  mx-2" style="  border:none;outline:none;"><a href="{{route('course.edit',$dt->id)}}" class="text-white">Update</a></button>
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