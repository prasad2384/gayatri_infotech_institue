@php
use App\Models\course;
$course_all = course::all();
@endphp

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Gayatri Infotech</title>
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Plugins -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/animate/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/aos/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/venobox/venobox.css') }}">
  <!-- Main Stylesheet -->
  <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
  <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- Modal content goes here -->
  </div>

  <!-- Header -->
  <header class="fixed-top header" style="position:sticky;">
    <!-- Top header -->


    <!-- Navbar -->
    <div class="navigation w-100" style="background-color: white;top:0; margin:0px 0" >
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
          <a class="navbar-brand" href="/"><img height="90px" width="110%" src="{{asset('frontend/images/logo.png')}}" alt="logo">&nbsp;</a>
          <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse"  id="navigation">
            <ul class="navbar-nav ml-auto text-center">
              <li class="nav-item ">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item @@about">
                <a class="nav-link" href="../about">About</a>
              </li>
              <li class="nav-item @@courses">
                <a class="nav-link" href="/courses">COURSES</a>
              </li>

              <li class="nav-item @@contact">
                <a class="nav-link" href="../contact">CONTACT</a>
              </li>
              @if(session('std_email')=='')
              <li class="nav-item @@contact">
                <a class="nav-link" href="../login">Login</a>
              </li>
              <li class="nav-item @@contact">
                <a class="nav-link" href="../register">Register</a>
              </li>
              @else
              <li class="nav-item @@contact">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
              <li class="nav-item @@contact">
                <a class="nav-link" href="../student_dashboard">User Dashboard</a>
              </li>
              <li class="nav-item @@contact">
                <a class="nav-link" href="">{{session('std_email')}}</a>
              </li>
              @endif
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- Header End -->
  @yield('matter')
  <!-- Footer -->
  <footer>
    <!-- footer content -->
    <div class="footer bg-footer section border-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-8 mb-5 mb-lg-0">
            <!-- logo -->
            <a class="logo-footer" href="/" style="font-weight:bold;font-size:30px;color:orange"><img class="mb-3" src="{{asset('frontend/images/logo.png')}}" height="110px" width="150%" alt="logo"></a>
            <p class="text-white">Firmament morning sixth subdue darkness creeping gathered divide our let god moving. Moving in fourth air night bring upon it beast let you dominion likeness open place day great.</p>
          </div>
          <!-- company -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class=" mb-3" style="font-weight:bold;color:orange">Courses</h4>
            <ul class="list-unstyled">
              @foreach($course_all as $co)
              <li class="mb-1"><a class="text-white" href="{{route('our_courses/',str_replace(array(' ','/'),'_',$co->course_name))}}">{{$co->course_name}}</a></li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-2 col-md-5 col-sm-4 col-6 mb-3 mb-md-0">
            <h4 class=" mb-3" style="font-weight:bold;color:orange">Address</h4>
            <ul class="list-unstyled">
              <li class="mb-3 text-white"><a class="text-white" href="#">9/4, Shri Markendaya Yantramag Dharak Society, Near New WIT College, Next to Upahar Bakery lane, Solapur - 413006.</a></li>
              <li class="mb-3 text-white"><a class="text-white" href="#"> +91 9422781840</a></li>
              <li class="mb-1 text-white"><a class="text-white" href="#"> gayatriinfotech123@gmail.com</a></li>
            </ul>
          </div>
          <!-- support -->

        </div>
      </div>
    </div>

  </footer>
  <!-- Scripts -->
  <script src="{{ asset('frontend/plugins/jQuery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/slick/slick.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/aos/aos.js') }}"></script>
  <script src="{{ asset('frontend/plugins/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/mixitup/mixitup.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/google-map/gmap.js') }}"></script>
  <script src="{{ asset('frontend/js/script.js') }}"></script>

  <!-- Additional scripts -->
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>