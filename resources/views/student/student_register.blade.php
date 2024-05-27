@extends('student.header')
@section('matter')

        <div class="d-flex align-items-center justify-content-center w-100" style="margin-top: 5%;margin-bottom: 5%;">
            <div class="row justify-content-center w-100">
                <div class="col-md-6 col-lg-5 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{asset('assets/images/logos/gayatri.png')}}" class="text-center" width="70%" height="120px" alt="" />
                            </div>
                            <form method="post" action="/studentstore" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12 mb-2 ">
                                    <label class="ml-3" style="color: black;">Name</label>
                                    <input type="text" class="form-control" id="std_name" name="std_name" placeholder="Name" value={{old('std_name')}}>
                                    <small class="" style="color:red">@error('std_name'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2 ">
                                    <label class="ml-3" style="color: black;">Email</label>
                                    <input type="text" class="form-control" id="std_email" name="std_email" placeholder="Email" value={{old('std_email')}}>
                                    <small class="" style="color:red">@error('std_email'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2 ">
                                    <label class="ml-3" style="color: black;">Password</label>
                                    <input type="password" class="form-control" id="std_password" name="std_password" placeholder="Enter Password" value={{old('std_password')}}>
                                    <small class="" style="color:red">@error('std_password'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color: black;">Phone No</label>
                                    <input type="tel" class="form-control" maxlength="10" id="std_phoneno" name="std_phoneno" placeholder="Phone Number" value={{old('std_phoneno')}}>
                                    <small class="" style="color:red">@error('std_phoneno'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color: black;">Date of Birth</label>
                                    <input type="date" class="form-control" id="std_dob" name="std_dob" placeholder="Date Of Birth" value={{old('std_dob')}}>
                                    <small class="" style="color:red">@error('std_dob'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2 mt-1  form-group">
                                    <!-- <label class="ml-3">Gender</label> -->
                                    <label class="ml-3" style="color: black;">Gender</label>
                                    <div class="mt-1">&emsp;<input type="radio" id="std_gender" value="Male" name="std_gender" id="">Male &emsp;<input type="radio" id="std_gender" value="Female" name="std_gender" id="">Female</div>
                                    <small class="" style="color:red">@error('std_gender'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color: black;">Upload Your Profile Photo</label>
                                    <input type="file" class="form-control" id="std_profile" name="std_profile">
                                    <small class="" style="color:red">@error('std_profile'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color: black;">College Name</label>
                                    <input type="text" class="form-control" id="std_clgname" name="std_clgname" placeholder="College Name" value={{old('std_clgname')}}>
                                    <small class="" style="color:red">@error('std_clgname'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color: black;">Select Your Degree</label>
                                    <select name="std_degree" id="std_degree" class="form-control" value={{old('std_degree')}} id="">
                                        <option value="">---------Please Select Degree---------</option>
                                        <option value="BE">BE</option>
                                        <option value="B.tech">B.tech</option>
                                        <option value="MCA">MCA</option>
                                        <option value="BCA">BCA</option>
                                        <option value="ME">ME</option>
                                        <option value="M.tech">M.tech</option>
                                        <option value="Bsc">Bsc</option>
                                        <option value="Bsc">Bcs</option>
                                        <option value="Msc">Msc</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <!-- <input type="text" class="form-control " name="std_degree"  placeholder="Degree"> -->
                                    <small class="" style="color:red">@error('std_degree'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color: black;">College Start time</label>
                                    <input type="time" class="form-control" id="std_clgtimefrom" name="std_clgtimefrom" placeholder="select College Start time" value={{old('std_clgtimefrom')}}>
                                    <small class="" style="color:red">@error('std_clgtimefrom'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color: black;">College end time</label>
                                    <input type="time" class="form-control" id="std_clgtimeto" name="std_clgtimeto" placeholder="enter College end time" value={{old('std_clgtimeto')}}>
                                    <small class="" style="color:red">@error('std_clgtimeto'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color: black;">Degree Passout Year </label>
                                    <input type="text" class="form-control" id="std_passoutyear" name="std_passoutyear" placeholder="enter pass out year" value={{old('std_passoutyear')}}>
                                    <small class="" style="color:red">@error('std_passoutyear'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color: black;">University Name</label>
                                    <input type="text" class="form-control" id="std_university" name="std_university" placeholder="Enter University" value={{old('std_university')}}>
                                    <small class="" style="color:red">@error('std_university'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color: black;">ParentsName</label>
                                    <input type="text" class="form-control" id="std_parentsname" name="std_parentsname" placeholder="Enter Parent's Name" value={{old('std_parentsname')}}>
                                    <small class="" style="color:red">@error('std_parentsname'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color:black;">Parents Phone </label>
                                    <input type="tel" class="form-control" id="std_parentsno" maxlength="10" name="std_parentsno" placeholder="Enter Parent's Number" value={{old('std_parentsno')}}>
                                    <small class="" style="color:red">@error('std_parentsno'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color: black;">Parents occupation</label>
                                    <input type="text" class="form-control" id="std_parentsoccupation" name="std_parentsoccupation" placeholder="Enter Parrent Occupation" value={{old('std_parentsoccupation')}}>
                                    <small class="" id="parents_occupation_error" style="color:red">@error('std_parentsoccupation'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="ml-3" style="color: black;">Address</label>
                                    <textarea type="text" class="form-control" id="std_address" name="std_address" placeholder="Address">{{old('std_address')}}</textarea>
                                    <small id="add_error" style="color:red">@error('std_address'){{$message}} @enderror</small>
                                </div>
                                <div class="col-12 mb-2">
                                    <button type="submit" id="btnstore" class="btn btn-sm btn-warning text-center w-100 py-8 fs-4 mb-4 rounded-2">SIGN UP</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                        <a class="text-warning fw-bold ms-2" href="./student_login_page">Sign In</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection