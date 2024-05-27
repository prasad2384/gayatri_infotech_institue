@extends('admin.header')
@section('content')
@php
$page_name="Add Category";
@endphp
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card w-100">
      <div class="card-body p-4">

        @if(Session::has('message'))
        <script>
          toast('success', '{{session("message")}}');
        </script>
        @endif
        <a href="../../category/create" class="btn btn-warning btn-sm float-end">Add Category</a>
        <h5 class="card-title fw-semibold mb-4">Category Table</h5>
        <div class="col-lg-12 align-items-stretch">
          <div class="table-responsive">
            <table class="table table-bordered text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr class="text-center">
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Category_Name</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Category_Image</h6>
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
                @foreach($data as $dt)
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">{{$dt->id}}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{$dt->category_name}}</h6>
                  </td>
                  <td class="border-bottom-0">
                    <!-- <h6 class="fw-semibold mb-1">{$dt->category_name}</h6> -->
                    <img src="../assets/images/{{$dt->category_image}}" height="100px" alt="">
                  </td>
                  <td class="border-bottom-0">
                    <form action="{{route('category.destroy',$dt->id)}}" method="post">
                      @csrf
                      @method('Delete')
                      <button type="submit" class="btn btn-sm btn-danger " style="background-color: red; border:none;outline:none;">Delete</button>
                    </form>
                  </td>
                  <td>
                    <a href="{{route('category.edit',$dt->id)}}" class="btn btn-sm btn-warning">Update</a>
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
<!-- kjkjkljj -->
@endsection