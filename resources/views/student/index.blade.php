@extends('student.header')
@section('matter')
@php
use App\Models\course;
$course=course::all();
@endphp
<!-- Modal -->

<!-- hero slider -->
<section class="hero-section overlay bg-cover" data-background="{{asset('frontend/images/banner/banner-1.jpg')}}">
  <div class="container">
    <div class="hero-slider">
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Your bright future is our mission</h1>
            <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor
              incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>
            <a href="../contact" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Your bright future is our mission</h1>
            <p class="text-muted mb-4" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor
              incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>
            <a href="../contact" class="btn btn-primary" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Your bright future is our mission</h1>
            <p class="text-muted mb-4" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor
              incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>
            <a href="../contact" class="btn btn-primary" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about us -->
<section class="section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-2 order-md-1">
        <h2 class="section-title">About Us</h2>
        <p>Vertex Technosys is a software based company, our experts serve a wide range of software development like web design, graphic design, web development, software development, mobile development, seo services, digital marketing, e-commerce solutions, custom application development, product development & web promotions services.</p>
        <p>We develop software that helps businesses. We offer more than just software development, we focus on clients' needs, go deep into requirements to suggest improvements, work according to a structured plan to reduce the budget and we never miss our deadlines.</p>
        <a href="about" class="btn btn-primary">Learn more</a>
      </div>
      <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
        <img class="img-fluid w-100" src="frontend/images/about/about-us.jpg" alt="about image">
      </div>
    </div>
  </div>
</section>

<!-- about us -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center section-title justify-content-between">
          <h2 class="mb-0 text-nowrap mr-3">Our Course</h2>
          <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          <div>
            <a href="courses" class="btn  btn-warning ml-sm-3 d-none d-sm-block">see all</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <!-- course item -->
      @foreach($course as $co)
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card p-0 border-primary rounded-0 hover-shadow">
          <a href="{{route('our_courses/',str_replace(array(' ','/'),'_',$co->course_name))}}">
            <img class="card-img-top rounded-0" src="../../assets/images/{{$co->course_image}}" height="200px" alt="course thumb">
          </a>
          <div class="card-body">
            <ul class="list-inline mb-2">
              <!-- <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li> -->
              <li class="list-inline-item"><a class="text-color" href="#">{{$co->total_fees}} ₹</a></li>
            </ul>
            <a href="{{route('our_courses/',str_replace(array(' ','/'),'_',$co->course_name))}}">
              <h4 class="card-title">{{$co->course_name}}</h4>
            </a>
            <!-- <p class="card-text mb-4">{{$co->shortdesc}}</p> -->
            <!-- {{$co->longdesc}} -->
            <form action="/studentcourseadd/{{$co->id}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary btn-sm">Add Course</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
      <!-- course item -->
    </div>
    <!-- /course list -->
</section>
@endsection