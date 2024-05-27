@extends('admin.header')
@section('content')
@php
$page_name="Update Faculty";
@endphp
<div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">{{$page_name}}</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{route('faculty.update',$faculty->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label">Select Course</label>
                        <select class="form-select" name='course_id' aria-label="Default select example">
                            <option value="" >--------Select Course-------</option>
                            @foreach($course as $co)
                            <option value="{{$co->id}}" {{$faculty->course_id==$co->id?'selected':''}}>{{$co->course_name}}</option>
                            @endforeach
                        </select>
                        <small class="" style="color:red">@error('course_id'){{$message}} @enderror</small>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Faculty Name</label>
                      <input type="text" name="faculty_name" value="{{$faculty->faculty_name}}" placeholder="Enter the Faculty Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <small class="" style="color:red">@error('faculty_name'){{$message}} @enderror</small>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Phone No</label>
                      <input type="number" name="faculty_mobileno" maxlength="10" value="{{$faculty->faculty_mobileno}}" placeholder="8855******" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <small class="" style="color:red">@error('faculty_mobileno'){{$message}} @enderror</small>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">City</label>
                      <input type="text" name="faculty_city" placeholder="City Name" value="{{$faculty->faculty_city}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <small class="" style="color:red">@error('faculty_city'){{$message}} @enderror</small>
                    </div>
                    <!-- <div class="mb-3 col-md-3 row">
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
                    </div> -->
                    <!-- <div class="mb-3">
                        <label class="form-label">Course Fee</label>
                        <select class="form-select" name='total_fee' aria-label="Default select example">
                            <option value="">--------Select Course Fee-------</option>
                            <option value="3000">3000</option>
                            <option value="4000">4000</option>
                            <option value="5000">5000</option>
                            <option value="8000">8000</option>
                            <option value="10000">10000</option>
                            <option value="20000">20000</option>
                        </select>
                    </div> -->
                    <!-- <div class="mb-3">
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
                    </div> -->
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Upload Image</label>
                        <div class="">
                            <img src="../../assets/images/{{$faculty->faculty_image}}" height="150px" alt="">
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Upload New Image</label>
                      <input type="file" name="faculty_image" class="form-control" id="exampleInputPassword1">
                    </div>
                    <!-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
                      <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                    <!-- </div> -->
                    <!-- <div class="mb-3 col-md-3 row">
                      <label for="exampleInputEmail1" class="form-label">Course Status</label>
                        <div class="form-check  col">
                            <input class="form-check-input ml-5" type="radio"  value="Active" name="course_status" id="flexRadioDefault1">
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
                    </div> -->
                    <button type="submit" class="btn btn-warning">{{$page_name}}</button>
                  </form>
                </div>
              </div>
              <!-- <h5 class="card-title fw-semibold mb-4">Disabled forms</h5>
              <div class="card mb-0">
                <div class="card-body">
                  <form>
                    <fieldset disabled>
                      <legend>Disabled fieldset example</legend>
                      <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Disabled input</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                      </div>
                      <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Disabled select menu</label>
                        <select id="disabledSelect" class="form-select">
                          <option>Disabled select</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
                          <label class="form-check-label" for="disabledFieldsetCheck">
                            Can't check this
                          </label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </fieldset>
                  </form>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
      <!-- table start -->
      
@endsection