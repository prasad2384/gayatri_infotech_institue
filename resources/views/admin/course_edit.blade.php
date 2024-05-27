@extends('admin.header')
@section('content')
@php
$page_name="Update Course";
@endphp
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{$page_name}}</h5>
        <div class="card">
          <div class="card-body">
            <form action="{{route('course.update',$course->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="mb-3">
                <label class="form-label">Select Category</label>
                <select class="form-select" name='category_id' aria-label="Default select example">
                  <option value="">--------Select Category-------</option>
                  @foreach($category as $cat)
                  <option value="{{$cat->id}}" {{$cat->id==$course->category_id?'selected':''}}>{{$cat->category_name}}</option>
                  @endforeach
                </select>
                <small class="" style="color:red">@error('category_id'){{$message}} @enderror</small>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Course Name</label>
                <input type="text" value="{{$course->course_name}}" name="course_name" placeholder="Enter the Category Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small class="" style="color:red">@error('course_name'){{$message}} @enderror</small>
              </div>
              <div class="mb-3 col-md-3 row">
                <label for="exampleInputEmail1" class="form-label">Course Mode</label>
                <div class="form-check  col">
                  <input class="form-check-input ml-5" {{$course->course_mode=="Online"?'checked':''}} type="radio" value="Online" name="course_mode" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Online
                  </label>
                </div>
                <div class="form-check col">
                  <input class="form-check-input" {{$course->course_mode=="Offline"?'checked':''}} type="radio" value="Offline" name="course_mode" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Offline
                  </label>
                </div>
                <small class="" style="color:red">@error('course_mode'){{$message}} @enderror</small>
              </div>
              <div class="mb-3">
                <label class="form-label">Course Fee</label>
                <!-- <select class="form-select" name='total_fee' aria-label="Default select example">
                            <option value="">--------Select Course Fee-------</option>
                            <option value="3000" {{$course->total_fees=="3000"?'selected':''}}>3000</option>
                            <option value="4000" {{$course->total_fees=="4000"?'selected':''}}>4000</option>
                            <option value="5000" {{$course->total_fees=="5000"?'selected':''}}>5000</option>
                            <option value="8000" {{$course->total_fees=="8000"?'selected':''}}>8000</option>
                            <option value="10000" {{$course->total_fees=="10000"?'selected':''}}>10000</option>
                            <option value="20000" {{$course->total_fees=="20000"?'selected':''}}>20000</option>
                        </select> -->
                <input type="number" name="total_fee" value="{{$course->total_fees}}" class="form-control" name="total_fee" id="">
                <small class="" style="color:red">@error('total_fee'){{$message}} @enderror</small>
              </div>
              <div class="mb-3">
                <label class="form-label">Select Course Duration</label>
                <select class="form-select" name='course_duration' aria-label="Default select example">
                  <option value="">--------Select Course Duration-------</option>
                  <option value="3 Months" {{$course->course_duration=="3 Months"?'selected':''}}>3 Months</option>
                  <option value="4 Months" {{$course->course_duration=="4 Months"?'selected':''}}>4 Months</option>
                  <option value="5 Months" {{$course->course_duration=="5 Months"?'selected':''}}>5 Months</option>
                  <option value="6 Months" {{$course->course_duration=="6 Months"?'selected':''}}>6 Months</option>
                  <option value="7 Months" {{$course->course_duration=="7 Months"?'selected':''}}>7 Months</option>
                  <option value="1 Year" {{$course->course_duration=="1 Year"?'selected':''}}>1 Year</option>
                </select>
                <small class="" style="color:red">@error('course_duration'){{$message}} @enderror</small>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Uploaded Image</label>
                <div>
                  <img src="../../assets/images/{{$course->course_image}}" class="mx-3" height="150px" alt="logo">
                </div>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
              </div>

              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Upload Image</label>
                <input type="file" name="course_image" class="form-control" id="exampleInputPassword1">
              </div>
              <!-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
              <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
              <!-- </div> -->
              <div class="mb-3 col-md-3 row">
                <label for="exampleInputEmail1" class="form-label">Course Status</label>
                <div class="form-check  col">
                  <input class="form-check-input ml-5" type="radio" value="Active" name="course_status" id="flexRadioDefault1" {{$course->course_status=="Active"?'checked':''}}>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Active
                  </label>
                </div>
                <div class="form-check col">
                  <input class="form-check-input" type="radio" value="Inactive" name="course_status" id="flexRadioDefault1" {{$course->course_status=="Inactive"?'checked':''}}>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Inactive
                  </label>
                </div>
                <small class="" style="color:red">@error('course_status'){{$message}} @enderror</small>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Short Description</label>
                <textarea name="shortdesc" placeholder="Enter the Short Description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{$course->shortdesc}}</textarea>
                <small class="" style="color:red">@error('shortdesc'){{$message}} @enderror</small>
              </div>
              <div class="mb-3" id="summernote">
                <label for="summernote_content" class="form-label">Long Description</label>
                <textarea class="form-control" id="summernote_content" name="summernote_content" required>{{$course->longdesc}}</textarea>
                <small class="" style="color:red">@error('longdesc'){{$message}} @enderror</small>
              </div>
              <button type="submit" class="btn btn-warning">{{$page_name}}</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#summernote_content').summernote();
  });
</script>
@endsection