@extends('admin.header')
@section('content')
@php
use App\Models\category;
use App\Models\course;
use App\Models\faculty;
use App\Models\studentdata;
use App\Models\contact;
use App\Models\batch;
use App\Models\course_add;
$category_count=category::count();
$course_count=course::count();
$faculty_count=faculty::count();
$student_count=studentdata::count();
$contact_count=contact::count();
$batch_count=batch::count();
$active=course_add::where([
    ['status','=','active']
    ])->count();
    $inactive=course_add::where([
    ['status','=','inactive']
    ])->count();
@endphp
<div class="container-fluid">
    <div class="row">
        <a class="col" href="../../category">
            <!-- Category -->
            <div class="card overflow-hidden border border-warning shadow">
                <div class="card-body p-3">
                    <h5 class="card-title mb-9 fw-semibold">Total Categories</h5>
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="fw-semibold mb-3">{{$category_count}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a href="../../course" class="col">
            <!-- Courses -->
            <div class="card overflow-hidden border border-warning shadow">
                <div class="card-body p-3">
                    <h5 class="card-title mb-9 fw-semibold">Total Courses</h5>
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="fw-semibold mb-3">{{$course_count}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a href="../../faculty" class="col">
            <!-- Faculty -->
            <div class="card overflow-hidden border border-warning shadow">
                <div class="card-body p-3">
                    <h5 class="card-title mb-9 fw-semibold">Total Faculty</h5>
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="fw-semibold mb-3">{{$faculty_count}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a href="../../students" class="col">
            <!-- Students -->
            <div class="card overflow-hidden border border-warning shadow">
                <div class="card-body p-3">
                    <h5 class="card-title mb-9 fw-semibold">Total Students</h5>
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="fw-semibold mb-3">{{$student_count}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        
    </div>
    <div class="container">
        <div class="row">

        <a href="../../showcontact" class="col">
            <!-- Students -->
            <div class="card overflow-hidden border border-warning shadow">
                <div class="card-body p-3">
                    <h5 class="card-title mb-9 fw-semibold">Total Contact</h5>
                    <div class="row align-items-center">
                        <div class="col-2">
                            <h4 class="fw-semibold mb-3">{{$contact_count}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </a>
            <a href="../../batch" class="col">
                <!-- Students -->
                <div class="card overflow-hidden border border-warning shadow">
                    <div class="card-body p-3">
                        <h5 class="card-title mb-9 fw-semibold">Total Batch</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3">{{$batch_count}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="../../fetchapplycourses" class="col">
                <!-- Students -->
                <div class="card overflow-hidden border border-warning shadow">
                    <div class="card-body p-3">
                        <h5 class="card-title mb-9 fw-semibold">Total Inactive Course Request</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3">{{$inactive}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <!-- <a href="../../batch" class="col">
                <div class="card overflow-hidden border border-warning shadow">
                    <div class="card-body p-3">
                        <h5 class="card-title mb-9 fw-semibold">Active</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3">{{$active}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a> -->
        </div>
    </div>

</div>

@endsection()