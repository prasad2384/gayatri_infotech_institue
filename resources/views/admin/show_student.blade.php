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
                <select class="form-select" name='course_id' id="studid" aria-label="Default select example">
                  <option value="">--------Select Student-------</option>
                  @foreach($student as $s)
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
                    <td>Status</td>
                  </tr>
                </thead>
                <tbody id="studdata">

                </tbody>
              </table>
              <button type="submit" class="btn btn-warning"></button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $('#fields').hide();
$(document).on('change','#selectstudent',function(){
    var id=$(this).val();
    // alert(id);
    var markup="";
    $.ajax({
        type:'GET',
        url:'applycoursefetch/'+id,
        success:function(res){
            // console.table(res);
            var count=1;
            for(i=0;i<res.length;i++)
            {
                markup+="<tr class='text-black'><td>"+count+"</td><td>"+res[i].course_name+"</td><td>"+res[i].total_fees+"</td><td>"+res[i].status+"</td></tr>";
                count++;
            }
            $('#studdata').html(markup);
            $('#fields').show();
        }
    })
})
});
</script>
@endsection