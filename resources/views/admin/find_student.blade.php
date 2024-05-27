@extends('admin.header')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Student Course Details</h5>
                <!-- <a href="../../category" class="btn btn-warning btn-sm float-end" >Show Category</a> -->
                <h5 class="card-title fw-semibold mb-4"></h5>
                @if(Session::has('message'))
                <script>
                    toast('success', '{{session("message")}}');
                </script>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col">
                                    <select name="" id="selectcourse" class="form-select">
                                        <option>---Select Courses---</option>
                                        @foreach($course as $c)
                                        <option value="{{$c->id}}">{{$c->course_name}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <small class="" id='course' style="color:red">Select Course</small> -->
                                </div>
                                <div class="col batches">
                                    <select name="" id="" class="form-select batch-dropdown">
                                        <option value="">Select Batch</option>
                                    </select>
                                    <!-- <small class="" id='batch' style="color:red">Select Batch Time</small> -->
                                </div>
                                <div class="col">
                                    <!-- <label for="exampleInputEmail1" class="form-label">Course Name</label> -->
                                    <!-- <select name="" id="selectstudent" class="form-select">
                                        <option>-----------Select Courses----------</option>
                                        @foreach($course as $c)
                                        <option value="{{$c->id}}">{{$c->course_name}}</option>
                                        @endforeach
                                    </select> -->
                                    <button class="btn btn-warning" type='button' id='showstudent'>Search</button>
                                </div>
                            </div>

                            <div class="table-responsive mt-4 tables">
                                <table class="table table-bordered text-nowrap w-100 mb-0 align-middle" width="100%">
                                    <thead class="text-dark fs-4">
                                        <tr class="text-center">
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Student Name</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Course Name</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Phone No</h6>
                                            </th>
                                           
                                            <!-- <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Email</h6>
                                            </th> -->
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Total Fees</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Paid Fees</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Reamaing Fees</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id='studpush'>

                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var cid = '';
        var batch_time = '';
        $('.tables').hide();
        $(document).on('change', '#selectcourse', function() {
            var cid = $(this).val();
            $.ajax({
                method: 'POST',
                url: '/api/fetchbatchtime/' + cid,
                data: cid,
                success: function(res) {
                    // console.log(res);
                    $.each(res, function(index, batchtime) {
                        $('.batch-dropdown').append('<option value="' + batchtime.batch_time + '">' + batchtime.batch_time + '</option>');
                    })
                }
            })
            $('.batch-dropdown').empty();
            $('.batch-dropdown').append('<option class="form-control" value="" selected> --- Select Batch time --- </option>');
            $(document).on('change', '.batch-dropdown', function() {
                var batch_time = $(this).val();
                // alert(batch_time+" "+cid);
                // $('#showstudent').on('click', function() {
                //     // alert(batch_time);
                //     var markup = '';
                //     var data = {
                //         cid: cid,
                //         batch_time: batch_time,
                //     }
                //     $.ajax({
                //         method: 'POST',
                //         url: '/api/showstudentdetails',
                //         data: data,
                //         success: function(success) {
                //             console.log(success);

                //             for (var i = 0; i < success.length; i++) {
                //                 markup += "<tr class='text-black text-center fw-bold'><td>" + success[i].std_name + "</td><td>" + success[i].course_name + "</td><td>" + success[i].std_email + "</td><td>"+success[i].total_fees+"</td><td>"+success[i].paid_fees+"</td></tr>";
                //             }
                //             $('.studpush').html(markup);
                //             $('.tables').show();
                //         },

                //     });
                //     $('.studpush').html('');
                // });
            });
        });

        $("#showstudent").click(function(e) {
            e.preventDefault();
            var cid = $('#selectcourse').val();
            var batch_time = $('.batch-dropdown').val();
            var markup = '';
            // alert(cid+" "+batch_time);
            var data = {
                cid: cid,
                batch_time: batch_time,
            }
            $.ajax({
                type: 'POST',
                url: '/api/showstudentdetails',
                data: data,
                success: function(success) {
                    // console.log(success.Student_fetch.length);
                    // console.log(success);
                    // console.log(success[2][0]);
                    var  coursenamearrays=success[1];
                    var total_amount=success[2];
                    for (var i = 0; i < success[0].length; i++) {
                        var courseNames = coursenamearrays[i].join(', ');
                        var totalfees= total_amount[i];
                        // markup += "<tr class='text-black text-center fw-bold'><td>" + success[0][i].std_name + "</td><td>" + success[0][i].std_email + "</td><td>" + success[i].total_fees + "</td><td>" + success[0][i].paid_fees + "</td></tr>";
                        markup += "<tr class='text-black text-center fw-bold'><td>" + success[0][i].std_name + "</td><td>"+courseNames
                        + "</td><td>"+success[0][i].std_phoneno+"</td><td>" +totalfees + "</td><td>" + success[0][i].paid_fees + "</td><td>"+ (parseInt(totalfees-success[0][i].paid_fees)==0?'<button type="button" class="btn blink btn-warning ">fees paid</button>':parseInt(totalfees-success[0][i].paid_fees))+"</td></tr>";
                        //  for(var j=0;j<success[1].length;j++){
                        //     markup+="<td>"+success[1][i].couse_name+"</td>"
                        //  }
                    }
                   

                    // var studentData = response[0];
                    // var courseNamesArray = response[1];
                    // var tableMarkup = '<table border="1"><thead><tr><th>Student ID</th><th>Course Names</th></tr></thead><tbody>';

                    $('#studpush').html(markup);
                    $('.tables').show();

                }
            });
        })
        function blink_text() {
      $('.blink').fadeOut(500);
      $('.blink').fadeIn(500);
    }
    setInterval(blink_text, 500);
    })
</script>

@endsection