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
                <h5 class="card-title fw-semibold mb-4">Student Register Table</h5>
                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr class="text-center">
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Student ID</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Student Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Email</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Password</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Phone Number</h6>
                                    </th>
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">Date Of Birth</h6>
                                    </th>
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">Gender</h6>
                                    </th>
                                    <!-- <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">Course</h6>
                                    </th> -->
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">Profile Image</h6>
                                    </th>
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">College Name</h6>
                                    </th>
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">Degree</h6>
                                    </th>
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">College Time From </h6>
                                    </th>
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">College Time To</h6>
                                    </th>
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">Passout Year</h6>
                                    </th>
                                    <!-- <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">Grade</h6>
                                    </th> -->
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">Board/University</h6>
                                    </th>
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">Parent's Name</h6>
                                    </th>
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">Parent's Number</h6>
                                    </th>
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">Parent's Occupation</h6>
                                    </th>
                                    <th class="border-bottom-0 datahide" >
                                        <h6 class="fw-semibold mb-0">Address</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Delete</h6>
                                    </th>
                                    <th id="hidebtn">
                                        <button class="btn btn-warning" id="btnclick"><h6 class="fw-semibold mb-0">Show More</h6></button>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $stud)
                                <tr>
                                    <td class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">{{ $stud->id }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_name }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_email }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_password }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_phoneno }}</h6>
                                    </td>
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_dob }}</h6>
                                    </td>
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_gender }}</h6>
                                    </td>
                                    <!-- <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_course }}</h6>
                                    </td> -->
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1"></h6> 
                                        <img src="assets/images/{{ $stud->std_profile }}" width="60px" height="60px" alt="logo">
                                    </td>
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_clgname }}</h6>
                                    </td>
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_degree }}</h6>
                                    </td>
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_clgtimefrom }}</h6>
                                    </td>
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_clgtimeto }}</h6>
                                    </td>
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_passoutyear }}</h6>
                                    </td>
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_university }}</h6>
                                    </td>
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_parentsname }}</h6>
                                    </td>
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_parentsno }}</h6>
                                    </td>
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_parentsoccupation }}</h6>
                                    </td>
                                    <td class="border-bottom-0 datahide">
                                        <h6 class="fw-semibold mb-1">{{ $stud->std_address }}</h6>
                                    </td>
                                    <td>
                                        <form action="/studentdelete/{{$stud->id}}" method="post">
                                            @csrf
                                            @method('Delete')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
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

<script>
    $(document).ready(function() {
        $('.datahide').hide();

        $(document).on('click', '#btnclick', function() {
            $('.datahide').show();
            $('#hidebtn').hide();
        })
    })
</script>
@endsection