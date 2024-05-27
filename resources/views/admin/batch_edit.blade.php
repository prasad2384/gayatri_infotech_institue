@extends('admin.header')
@section('content')
@php
$page_name="Update Batch"
@endphp
<div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">{{$page_name}}</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{route('batch.update',$batch->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label">Select Course</label>
                        <select class="form-select" name='course_id' aria-label="Default select example">
                            <option value="" >--------Select Course-------</option>
                            @foreach($course as $co)
                            <option value="{{$co->id}}"{{$co->id==$batch->course_id?'selected':''}}>{{$co->course_name}}</option>
                            @endforeach
                        </select>
                        <small class="" style="color:red">@error('course_id'){{$message}} @enderror</small>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Batch Time</label>
                      <div>
                        {{$batch->batch_time}}
                      </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Batch Time</label>
                        <!-- <select class="form-select" name='batch_time' aria-label="Default select example">
                            <option value="">--------Select Batch Time-------</option>
                            <option value="7AM to 8AM" {{$batch->batch_time=="7AM to 8AM"?'selected':''}}>7AM to 8AM</option>
                            <option value="8AM to 9AM" {{$batch->batch_time=='8AM to 9AM'?'selected':''}}>8AM to 9AM</option>
                            <option value="9AM to 10AM" {{$batch->batch_time=='9AM to 10AM'?'selected':''}}>9AM to 10AM</option>
                            <option value="10AM to 11AM" {{$batch->batch_time=='10AM to 11AM'?'selected':''}}>10AM to 11AM</option>
                            <option value="5PM to 6PM" {{$batch->batch_time=='5PM to 6PM'?'selected':''}}>5PM to 6PM</option>
                            <option value="6PM to 7PM" {{$batch->batch_time=='6PM to 7PM'?'selected':''}}>6PM to 7PM</option>
                            <option value="7PM to 8PM" {{$batch->batch_time=='7PM to 8PM'?'selected':''}}>7PM to 8PM</option>
                            <option value="8PM to 9PM" {{$batch->batch_time=='7PM to 8PM'?'selected':''}}>8PM to 9PM</option>
                            <option value="10AM to 9PM" {{$batch->batch_time=='10AM to 9PM'?'selected':''}}>10AM to 6PM</option>
                        </select> -->
                        <input type="time" value="{{$batch->batch_time}}" class="form-control" name="batch_time" name="" id="">

                      <small class="" style="color:red">@error('batch_time'){{$message}} @enderror</small>
                    </div>
                    <button type="submit" class="btn btn-warning">{{$page_name}}</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection