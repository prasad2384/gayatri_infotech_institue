@extends('student.header')
@section('matter')

<!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
  <div class="container" >
    <div class="row" >
    <div class="col-md-8" style="margin-top:0px">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">About Us</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured
          by some universities and the emphasis placed on final exams by others.</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->
<!-- about -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        {{-- <img class="img-fluid w-100 mb-4" src="images/about/about-page.jpg" alt="about image"> --}}
        <h2 class="section-title">ABOUT OUR JOURNY</h2>
        <p>Vertex Technosys is a software based company, our experts serve a wide range of software development like web design, graphic design, web development, software development, mobile development, seo services, digital marketing, e-commerce solutions, custom application development, product development & web promotions services.</p>
        <p>We develop software that helps businesses. We offer more than just software development, we focus on clients' needs, go deep into requirements to suggest improvements, work according to a structured plan to reduce the budget and we never miss our deadlines.</p>
        <p>Vertex Technosys has delivered the services of highly skilled professionals to our clients. Our experience, teamwork and processes makes us separate from the crowd and let us deliver success with memorable experience and services. We ask and answer all important questions and provide all services to get jobs done right; right on time, right the first time!</p>
        <p>We provide a quality driven approach towards software development and deliver services beyond expectations always!</p>
      </div>
    </div>
  </div>
</section>
<!-- /about -->

<!-- funfacts -->
<!-- <section class="section-sm bg-warning">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
        <div class="text-center">
          <h2 class="count text-white"></h2>
          <h5 class="text-white">TEACHERS</h5>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
        <div class="text-center">
          <h2 class="count text-white"></h2>
          <h5 class="text-white">COURSES</h5>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
        <div class="text-center">
          <h2 class="count text-white"></h2>
          <h5 class="text-white">STUDENTS</h5>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
        <div class="text-center">
          <h2 class="count text-white">0</h2>
          <h5 class="text-white">SATISFIED CLIENT</h5>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- success story -->
 <!-- <section class="section bg-cover" data-background="images/backgrounds/success-story.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-4 position-relative success-video">
        <a class="play-btn venobox" href="https://youtu.be/nA1Aqp0sPQo" data-vbtype="video">
          <i class="ti-control-play"></i>
        </a>
      </div>
      <div class="col-lg-6 col-sm-8">
        <div class="bg-white p-5">
          <h2 class="section-title">Success Stories</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
        </div>
      </div>
    </div>
  </div>
</section>  -->
<!-- /success story -->

<!-- teachers -->
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="section-title">Our Teachers</h2>
      </div>
      @foreach ($faculty as $f)
      <!-- teacher -->
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <img class="card-img-top rounded-0" height="300px" width="150px" src="/assets/images/{{ $f->faculty_image }}" alt="teacher">
          <div class="card-body">
            <a href="teacher-single.html">
              <h4 class="card-title">{{ $f->faculty_name }}</h4>
            </a>
            <div class="d-flex justify-content-between">
              <span>Teacher</span>
              <ul class="list-inline">
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- /teachers -->
@endsection