@extends('admin.header')
@section('content')
@php
$page_name="Add Batch";
@endphp
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <a href="../../batch" class="btn btn-sm btn-warning float-end">Show Batches</a>
        <h5 class="card-title fw-semibold mb-4">{{$page_name}}</h5>
        @if(Session::has('message'))
        <script>
          toast('success', '{{session("message")}}');
        </script>
        @endif
        <div class="card">
          <div class="card-body">
            <form action="{{route('batch.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label class="form-label">Select Course</label>
                <select class="form-select" name='course_id' aria-label="Default select example">
                  <option value="">--------Select Course-------</option>
                  @foreach($course as $co)
                  <option value="{{$co->id}}">{{$co->course_name}}</option>
                  @endforeach
                </select>
                <small class="" style="color:red">@error('course_id'){{$message}} @enderror</small>
              </div>
              <div class="mb-3">
                <label class="form-label">Batch Time</label>
                <!-- <select class="form-select" name='batch_time' aria-label="Default select example">
                            <option value="">--------Select Batch Time-------</option>
                            <option value="7AM to 8AM">7AM to 8AM</option>
                            <option value="8AM to 9AM">8AM to 9AM</option>
                            <option value="9AM to 10AM">9AM to 10AM</option>
                            <option value="10AM to 11AM">10AM to 11AM</option>
                            <option value="5PM to 6PM">5PM to 6PM</option>
                            <option value="6PM to 7PM">6PM to 7PM</option>
                            <option value="7PM to 8PM">7PM to 8PM</option>
                            <option value="8PM to 9PM">8PM to 9PM</option>
                            <option value="10AM to 9PM">10AM to 6PM</option>
                          </select> -->
                <input type="time" class="form-control" name="batch_time" name="" id="">
                <small class="" style="color:red">@error('batch_time'){{$message}} @enderror</small>
              </div>
              <button type="submit" class="btn btn-warning">{{$page_name}}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection