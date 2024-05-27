@extends('admin.header')
@section('content')
@php
$page_name="Add Category";
@endphp
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="../../category" class="btn btn-warning btn-sm float-end" >Show Category</a>
                <h5 class="card-title fw-semibold mb-4">{{$page_name}}</h5>
                @if(Session::has('message'))
                <script>
                    toast('success', '{{session("message")}}');
                </script>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Cateogry Name</label>
                                <input type="text" name="category_name" placeholder="Enter the Category Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <small class="" style="color:red">@error('category_name'){{$message}} @enderror</small>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Upload Image</label>
                                <input type="file" name="category_image" class="form-control" id="exampleInputPassword1">
                                <small class="" style="color:red">@error('category_image'){{$message}} @enderror</small>
                            </div>
                            <!-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
                            <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                            <!-- </div> -->
                            <button type="submit" id="submit-btn" class="btn btn-warning">{{$page_name}}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection