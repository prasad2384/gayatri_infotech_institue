@extends('admin.header')
@section('content')
<div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Add Category</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{route('category.update',$fetch->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('Patch')
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Cateogry Name</label>
                      <input type="text" name="category_name" value="{{$fetch->category_name}}" placeholder="Enter the Category Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <small class="" style="color:red">@error('category_name'){{$message}} @enderror</small>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Uploaded Image</label>
                        <div>
                            <img src="../../assets/images/{{$fetch->category_image}}" class="mx-3" height="150px" alt="logo">
                        </div>
                      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Upload Image</label>
                      <input type="file" name="category_image" class="form-control" id="exampleInputPassword1">
                    </div>
                    <!-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
                      <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                    <!-- </div> -->
                    <button type="submit" class="btn btn-info">Update</button>
                  </form>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
   
@endsection