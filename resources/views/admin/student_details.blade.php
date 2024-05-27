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
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Student Name</label>
                                <select name="" id="selectstudent" class="form-select">
                                    <option>-----------Select Student----------</option>
                                    @foreach($student_data as $st)
                                    <option value="{{$st->id}}">{{$st->std_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <table class="table table-bordered text-nowrap mb-0 align-middle" id="fields">
                                <thead>
                                    <tr class="text-black fw-bolder text-center">
                                        <td>Sr.No</td>
                                        <td>Course Name</td>
                                        <td>Course Fees</td>
                                        <td>Batch Time</td>
                                        <td colspan='2'>Status</td>
                                    </tr>
                                </thead>
                                <tbody id="studdata">

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Batches</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <form method="get">
                    @csrf -->
                <div class="form-group mb-3" id='showbatch'>
                    <!-- <label for="recipient-name" class="col-form-label">Choose Batch:</label> -->
                </div>
            </div>
            <!-- </form> -->
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="active btn btn-warning">Active Course</button>
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
<script>
    $(document).ready(function() {
        var id = '';
        $('#fields').hide();
        $(document).on('change', '#selectstudent', function() {
            id = $(this).val();

            // alert(id);
            var markup = "";
            $.ajax({
                type: 'get',
                url: 'applycoursefetch/' + id,
                success: function(res) {
                    // console.table(res);
                    if (res.length == '') {
                        alert('No Course Adds');
                        $('#fields').hide();
                    }
                    var count = 1;
                    for (i = 0; i < res.length; i++) {
                        markup += "<tr class='text-black text-center fw-bold'><td>" + count + "</td><td>" + res[i].course_name + "</td><td>" + res[i].total_fees + "</td><td>" + (res[i].batch_time == 0 ? '<p class="text-white" style="margin-top:15px;background-color:#d71919;">No Batch Time Assign</p>' : res[i].batch_time) + "</td><td>" + res[i].status + "</td><td colspan='2'>" + (res[i].status == 'inactive' ? '<button type="button" class="coursebatch btn btn-sm btn-primary" data-id="' + res[i].course_id + '" >Active Course</button>' : '<p  style="margin-top:15px;padding:2px;border-radius:5px;background-color:#45db45;">This Course is Already Active</p>') + "</td></tr>";
                        count++;
                    }
                    $('#studdata').html(markup);
                    $('#fields').show();
                    // $('.msg').hide();
                }
            });
        })

        $(document).on('click', '.coursebatch', function() {

            // let  cid = document.getElementsByClassName("coursebatch").value;
            var cid = $(this).data("id");
            // var cid=$(this).val();
            // alert(cid);
            var markup1 = "";
            $.ajax({
                type: 'get',
                url: 'fetchbatch/' + cid,
                success: function(result) {
                    if (result == '') {
                        alert('No Batch Time is Available for these course');
                        window.location.href = '/fetchapplycourses';
                    } else {
                        $('#exampleModal').modal("show");
                        for (var i = 0; i < result.length; i++) {
                            // $('#showbatch').append("<input type='radio' class=' ' id='recipient-name'>"+result[i].batch_time);
                            markup1 += "<input type='radio' class='bid' name='batch_time' value='" + result[i].batch_time + "'>" + result[i].batch_time + "&emsp;";

                        }
                        $('#showbatch').html(markup1);

                    }
                    $('.bid').on('click', function() {
                        batch_time = $(this).val();
                        // console.log(batch_time);
                        $('.active').on('click', function(e) {
                            // $(this).val('');
                            e.preventDefault();
                            var data = {
                                id: id,
                                cid: cid,
                                batch_time: batch_time,
                            }
                            //console.log(data);
                            $.ajax({
                                url: "/api/activebatch",
                                method: "post",
                                data: data,
                                success: function(data) {
                                    //console.log(data);
                                    alert('Course Activated');
                                    window.location.href = '/fetchapplycourses';
                                    // window.history(-1);
                                },
                                error: function(data) {
                                    console.log(data);
                                }
                            })
                        })
                    })

                }
            })
        });
    });
</script>


@endsection