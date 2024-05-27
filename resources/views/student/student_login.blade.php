@extends('student.header')
@section('matter')
            <div class="d-flex align-items-center justify-content-center w-100" style="margin-top: 5%;margin-bottom: 5%;">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-4 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/logos/gayatri.png')}}" class="text-center" width="70%" height="120px" alt="" />
                                </div>
                                <!-- <p class="text-center">Gayatri Infotech</p> -->
                                <form action="/student_login" method="post" class="row">
                                    @csrf
                                    <div class="mb-2">
                                        <label for="">Email ID</label>
                                        <input type="text" class="form-control mb-3" id="loginName" name="std_email" placeholder="Email_ID" value={{old('std_email')}}>
                                        <small class="" style="color:red">@error('std_email'){{$message}} @enderror</small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control mb-3" id="loginPassword" name="std_password" placeholder="Password" value={{old('std_password')}}>
                                        <small class="" style="color:red">@error('std_password'){{$message}} @enderror</small>
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-sm btn-warning text-center w-100 py-8 fs-4 mb-4 rounded-2">LOGIN</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection