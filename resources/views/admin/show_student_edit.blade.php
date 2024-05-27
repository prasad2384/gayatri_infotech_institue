@extends('admin.header')
@section('content')
@php
$page_name="Update Student Course";
@endphp
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="../../category" class="btn btn-warning btn-sm float-end">Show Category</a>
                <h5 class="card-title fw-semibold mb-4">{{$page_name}}</h5>
                @if(Session::has('message'))
                <script>
                    toast('success', '{{session("message")}}');
                </script>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('course_request.update',$data->course_adds_id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Student Name</label>
                                <input type="text" value="{{$data->std_name}}" readonly name="category_name" placeholder="Enter the Category Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <!-- <small class="" style="color:red">@error('category_name'){{$message}} @enderror</small> -->
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Student Apply Course </label>
                                <input type="text" value="{{$data->course_name}}" readonly name="category_name" placeholder="Enter the Category Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <!-- <small class="" style="color:red">@error('category_name'){{$message}} @enderror</small> -->
                            </div>
                            <div class="mb-3 col-md-3 row">
                                <label for="exampleInputEmail1" class="form-label">Course Mode</label>
                                <div class="form-check  col">
                                    <input class="form-check-input ml-5" type="radio"  value="active" name="status" id="flexRadioDefault1" {{$data->status=="active"?'checked':''}}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        active
                                    </label>
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" value="inactive" name="status" id="flexRadioDefault1" {{$data->status=="inactive"?'checked':''}}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        inactive
                                    </label>
                                </div>
                            </div>
                                <!-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
                                <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                                <!-- </div> -->
                                <button type="submit" id="submit-btn" class="btn btn-warning">Update</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection