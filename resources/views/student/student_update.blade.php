@extends('student.dashboardheader')
@section('content')
@php
$page_name="Student Update"
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
        <!-- <a href="../course" class="btn btn-warning btn-sm float-end">Show Courses</a> -->
        <h5 class="card-title fw-semibold mb-4">{{$page_name}}</h5>
        <div class="card">
          <div class="card-body">
            <form action="/updatestudent/{{$student->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Name</label>
                <input type="text" class="form-control" value="{{ $student->std_name }}" name="std_name">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">email</label>
                <input type="text" class="form-control" value="{{ $student->std_email }}" name="std_email">
              </div>
              {{-- <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="std_password" value="{{ $student->std_email }}">
          </div> --}}
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone Number</label>
            <input type="tel" maxlength="10" class="form-control" value="{{ $student->std_phoneno }}" name="std_phoneno">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">DOB</label>
            <input type="date" class="form-control" value="{{ $student->std_dob }}" name="std_dob">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">
              <h6>Gender</h6>
            </label>
                <div>
                  
                  <input type="radio" class="" value="Male" name="std_gender"  {{$student->std_gender=="Male"?'checked':''}}> male &nbsp;
                  <input type="radio" class="" value="Female" name="std_gender"  {{$student->std_gender=="Female"?'checked':''}}> female
                </div>

          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Image</label>
            <input type="file" class="form-control mb-3" name="std_profile">
            <img src="./assets/images/{{ $student->std_profile }}" height="200px" alt="logo">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">College Name</label>
            <input type="text" class="form-control" value="{{ $student->std_clgname }}" name="std_clgname">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Degree</label>
            <select name="std_degree" class="form-control " id="">
              <option value="">---------Please Select Degree---------</option>
              <option value="BE" {{$student->std_degree=="BE"?'selected':''}}>BE</option>
              <option value="B.tech" {{$student->std_degree=="B.tech"?'selected':''}}>B.tech</option>
              <option value="MCA" {{$student->std_degree=="MCA"?'selected':''}}>MCA</option>
              <option value="BCA" {{$student->std_degree=="BCA"?'selected':''}}>BCA</option>
              <option value="ME" {{$student->std_degree=="ME"?'selected':''}}>ME</option>
              <option value="M.tech" {{$student->std_degree=="M.tech"?'selected':''}}>M.tech</option>
              <option value="Bsc" {{$student->std_degree=="Bsc"?'selected':''}}>Bsc</option>
              <option value="Msc" {{$student->std_degree=="Msc"?'selected':''}}>Msc</option>
              <option value="Diploma" {{$student->std_degree=="Diploma"?'selected':''}}>Diploma</option>
              <option value="Others" {{$student->std_degree=="Others"?'selected':''}}>Others</option>
            </select>
            <!-- <input type="text" class="form-control" value="{{ $student->std_degree }}" name="std_degree"> -->
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">college start time</label>
            <input type="time" class="form-control" value="{{ $student->std_clgtimefrom }}" name="std_clgtimefrom">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">college end time</label>
            <input type="time" class="form-control" value="{{ $student->std_clgtimeto }}" name="std_clgtimeto">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pass Out Year</label>
            <input type="text" class="form-control" value="{{ $student->std_passoutyear }}" name="std_passoutyear">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">University</label>
            <input type="text" class="form-control" value="{{ $student->std_university }}" name="std_university">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Parent's Name</label>
            <input type="text" class="form-control" value="{{ $student->std_parentsname }}" name="std_parentsname">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Parent's Phone Number</label>
            <input type="tel" maxlength="10" class="form-control" value="{{ $student->std_parentsno }}" name="std_parentsno">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Parent's Occupation</label>
            <input type="text" class="form-control" value="{{ $student->std_parentsoccupation }}" name="std_parentsoccupation">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Address</label>
            <input type="text" class="form-control" value="{{ $student->std_address }}" name="std_address">
          </div>
          <div>
            <button class="btn btn-warning">{{$page_name}}</button>
          </div>
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
@endsection