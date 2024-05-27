@extends('admin.header')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-body p-4">
                @if(Session::has('message'))
                <script>
                    toast('success', '{{session("message")}}');
                </script>
                @endif
                <!-- <a href="../../course/create" class="btn btn-warning btn-sm float-end">Add Courses</a> -->
                <h5 class="card-title fw-semibold mb-4">Course Request Table</h5>
                <div class="col-lg-12 align-items-stretch">
                    <div class="table-responsive">

                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Select Student</label>
                                <select class="form-select" id="studid" aria-label="Default select example">
                                    <option value="">--------Select Student-------</option>
                                    @foreach($students as $s)
                                    <option value="{{$s->id}}">{{$s->std_name}}</option>
                                    @endforeach
                                </select>
                                <small class="" style="color:red">@error('course_id'){{$message}} @enderror</small>
                            </div>
                            <table class="table table-bordered text-nowrap mb-0 align-middle" id="fields">
                                <thead>
                                    <tr class="text-black">
                                        <td>Sr.No</td>
                                        <td>Course Name</td>
                                        <td>Course Fees</td>
                                        <td>Batch Time</td>
                                        <td>Status</td>
                                        <td>Delete</td>
                                    </tr>
                                </thead>
                                <tbody id="coursesfetch">

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#fields').hide();
        $('#studid').on('change', function() {
            var sid = $(this).val();
            // alert(sid);
            console.log(sid);
            var markup = '';
            $.ajax({
                type: "GET",
                url: 'course_fetch_d/' + sid,
                success: function(res) {
                    console.log(res);
                    if (res.length == '') {
                        alert('course not Enrolled');
                    }
                    var count = 1;
                    for (i = 0; i < res.length; i++) {
                        markup += "<tr class='text-black text-center fw-bold'><td>" + count + "</td><td>" + res[i].course_name + "</td><td>" + res[i].total_fees + "</td><td>" + (res[i].batch_time == 0 ? '<p class="text-white" style="margin-top:15px;background-color:#d71919;">No Batch Time Assign</p>' : res[i].batch_time) + "</td><td>" + res[i].status + "</td><td colspan='2'><button type='button' class='btnid btn btn-sm' value=" + res[i].course_id + "  style='background-color:red;color:white'>Delete</button></td></tr>";
                        count++;
                    }
                    $('#coursesfetch').html(markup);
                    $('#fields').show();
                    $('.btnid').on('click', function() {
                        var course_id = $(this).val();
                        // alert(course_id);
                        console.log(course_id);
                        $.ajax({
                            url: "/api/Deletecourseadds",
                            type: "POST",
                            data: {
                                sid: sid,
                                course_id: course_id,
                            },
                            success: function(data) {
                                //console.log(data);
                                alert('Student Enrolled Course Deleted Successfully');
                                window.location.href = '/course_request_delete';
                                // window.history(-1);
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        })
                    })
                }
            })
        });
    });
</script>
@endsection