@extends('admin.header')
@section('content')
@php
$page_name="Add Fees";
@endphp
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- <a href="../../batch" class="btn btn-sm btn-warning float-end">Show Fees</a> -->
                <h5 class="card-title fw-semibold mb-4">{{$page_name}}</h5>
                @if(Session::has('message'))
                <script>
                    toast('success', '{{session("message")}}');
                </script>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" id="s_id" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Select Student</label>
                                <select class="form-select" id="selectstudent" name='student_id' aria-label="Default select example">
                                    <option value="">--------Select Student-------</option>
                                    @foreach($student_fetch as $st)
                                    <option value="{{$st->id}}">{{$st->std_name}}</option>
                                    @endforeach
                                </select>
                                <span id="totalcourse">No courses Applied</span>
                                <small class="" style="color:red">@error('course_id'){{$message}} @enderror</small>
                            </div>
                            <div class="mb-3">
                                <ul id="stud_courses"></ul>
                            </div>
                            <!-- <div class="mb-3 fields">
                                <label class="form-label">Total Fee</label>

                                <h6></h6>
                                <input type="number" class="form-control " name="course_fee" id="">
                                <small class="" style="color:red">@error('batch_time'){{$message}} @enderror</small>
                            </div> -->
                            <div class="mb-3 fields">
                                <label class="form-label">Pay Fee</label>
                                <input type="number" class="form-control" name="paid_fees" id="input_fee">
                                <small class="" style="color:red">@error('batch_time'){{$message}} @enderror</small>
                                <span id='greater_than_remaining' style="color:red;">Not More Than Remaining Fee</span>
                            </div>
                            <button type="submit" id="btn" class="btn btn-warning">{{$page_name}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.fields').hide();
        $('#totalcourse').hide();
        $('#greater_than_remaining').hide();
        $('#btn').hide();
        $(document).on('change', '#selectstudent', function() {
            $("#stud_courses").html("");
            var id = $(this).val();
            // $('.fields').show();
            $.ajax({
                type: 'GET',
                url: 'fetchcourse/' + id,
                success: function(res) {
                    // alert(res);
                    console.log(res);
                    if (res == '') {
                        alert('Course Not Entrolled');
                        $('#btn').hide();
                        $('.fields').hide();
                    } else {
                        $('#btn').show();
                        $('#s_id').attr('action', '/addfee/' + id);
                        let total_fees = 0;
                        // alert(res.length);
                        for (var i = 0; i < res.length; i++) {
                            $("#stud_courses").append(
                                "<li class='text-black'>" + res[i].course_name + " - " + res[i].total_fees + "</li>"
                            );
                            total_fees += parseInt(res[i].total_fees);
                        }
                        $.ajax({
                            type: "GET",
                            url: 'showfee/' + id,
                            success: function(result) {
                                let remaining_fees = parseInt(total_fees - result.paid_fees);
                                // alert(remaining_fees);
                                $("#stud_courses").append("<li class='mb-2 '> Paid Fees : " + parseInt(result.paid_fees) + "</li>");
                                $("#stud_courses").append("<li class='mb-2 ' style='background-color:red;color:white'> Remaining Fees : " + remaining_fees + "</li>");

                                $(document).on('keyup', '#input_fee', function() {
                                    var input_fees = $(this).val();
                                    console.log(input_fees);
                                    console.log(remaining_fees);
                                    if (remaining_fees < input_fees) {
                                        $('#greater_than_remaining').show();
                                        $('#btn').hide();
                                        // alert('Your Enter Fees is greater than Remaining Fees');
                                    } else {
                                        $('#greater_than_remaining').hide();

                                        $('#btn').show();
                                    }
                                });
                                // if (total_fees == result.paid_fees) {
                                //     alert('All payment is done')
                                //     // $('#btn').hide();
                                //     // $('.fields').hide();
                                // }
                                // else
                                // {
                                //     // $('.fields').show();
                                // // $('#btn').show();
                                // }

                            }
                        });
                        $("#stud_courses").append("<li class='text-info'>Total Fees : " + total_fees + "</li>");
                        $('.fields').show();
                    }
                }
            })
            // alert(id);
        });
    });
</script>
@endsection