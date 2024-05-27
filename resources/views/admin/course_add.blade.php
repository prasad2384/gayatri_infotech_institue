@extends('admin.header')
@section('content')
@php
$page_name="Add Course";
@endphp
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        @if(Session::has('message'))
        <script>
          toast('success', '{{session("message")}}');
        </script>
        @endif
        <a href="../course" class="btn btn-warning btn-sm float-end">Show Courses</a>
        <h5 class="card-title fw-semibold mb-4">{{$page_name}}</h5>
        <div class="card">
          <div class="card-body">
            <form action="{{route('course.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label class="form-label">Select Category</label>
                <select class="form-select" name='category_id' aria-label="Default select example">
                  <option value="">--------Select Category-------</option>
                  @foreach($category as $cat)
                  <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                  @endforeach
                </select>
                <small class="" style="color:red">@error('category_id'){{$message}} @enderror</small>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Course Name</label>
                <input type="text" name="course_name" placeholder="Enter the Course Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                <small class="" style="color:red">@error('course_name'){{$message}} @enderror</small>
              </div>
              <div class="mb-3 col-md-3 row">
                <label for="exampleInputEmail1" class="form-label">Course Mode</label>
                <div class="form-check  col">
                  <input class="form-check-input ml-5" type="radio" value="Online" name="course_mode" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Online
                  </label>
                </div>
                <div class="form-check col">
                  <input class="form-check-input" type="radio" value="Offline" name="course_mode" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Offline
                  </label>
                </div>
                <small class="" style="color:red">@error('course_mode'){{$message}} @enderror</small>
              </div>
              <div class="mb-3">
                <label class="form-label">Course Fee</label>

                <input type="number" placeholder='Enter Course Fee' name="total_fee" class="form-control" name="total_fee" id="">
                <small class="" style="color:red">@error('total_fee'){{$message}} @enderror</small>
              </div>
              <div class="mb-3">
                <label class="form-label">Select Course Duration</label>
                <select class="form-select" name='course_duration' aria-label="Default select example">
                  <option value="">--------Select Course Duration-------</option>
                  <option value="3 Months">3 Months</option>
                  <option value="4 Months">4 Months</option>
                  <option value="5 Months">5 Months</option>
                  <option value="6 Months">6 Months</option>
                  <option value="7 Months">7 Months</option>
                  <option value="1 Year">1 Year</option>
                </select>
                <small class="" style="color:red">@error('course_duration'){{$message}} @enderror</small>
              </div>


              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Upload Image</label>
                <input type="file" name="course_image" class="form-control" id="exampleInputPassword1">
                <small class="" style="color:red">@error('course_image'){{$message}} @enderror</small>
              </div>
              <!-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
              <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
              <!-- </div> -->
              <div class="mb-3 col-md-3 row">
                <label for="exampleInputEmail1" class="form-label">Course Status</label>
                <div class="form-check  col">
                  <input class="form-check-input ml-5" type="radio" value="Active" name="course_status" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Active
                  </label>
                </div>
                <div class="form-check col">
                  <input class="form-check-input" type="radio" value="Inactive" name="course_status" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Inactive
                  </label>
                </div>
                <small class="" style="color:red">@error('course_status'){{$message}} @enderror</small>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Short Description</label>
                <textarea name="shortdesc" placeholder="Enter the Short Description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                <small class="" style="color:red">@error('shortdesc'){{$message}} @enderror</small>
              </div>
              <div class="mb-3" id="summernote">
                <label for="summernote_content">Long Description</label>
                <textarea class="form-control" id="summernote_content" name="summernote_content"></textarea>
                <small class="" style="color:red">@error('summernote_content'){{$message}} @enderror</small>
              </div>

              <button type="submit" class="btn btn-warning">{{$page_name}}</button>
            </form>
            <script>
              $(document).ready(function() {
                $('#summernote_content').summernote();
              });
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection