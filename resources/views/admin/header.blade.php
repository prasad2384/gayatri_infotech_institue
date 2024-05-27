
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gayatri Infotech</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script>
        //sweetalert function
        function showSweetAlert(t,e,i){Swal.fire({title:title,text:text,icon:type})}
        //sweetalert toast
        function toast(e,t){const i=Swal.mixin({toast:!0,position:"top-end",showConfirmButton:!1,timer:3e3,timerProgressBar:!0,didOpen:e=>{e.addEventListener("mouseenter",Swal.stopTimer),e.addEventListener("mouseleave",Swal.resumeTimer)}});i.fire({icon:e,title:t})}
    </script>


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

</head>

<body>

@if(Session::has('success'))
    <script>
        toast('success', '{{session("success")}}');
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        toast('error', '{{session("error")}}');
    </script>
    @endif
    @if(Session::has('warning'))
    <script>
        toast('warning', '{{session("warning")}}');
    </script>
  @endif
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <div class="mt-2 mb-2">
            <a href="../admin" class="text-nowrap text-warning logo-img" style="font-size:21px;font-weight:bolder;">
            &nbsp; <img src="{{asset('assets/images/logos/gayatri.png')}}" width="110%" height="100px" alt="" />      
              </a>
          </div>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <!-- <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li> -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="../../admin" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <!-- <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">UI COMPONENTS</span>
            </li> -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="../../category" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Category</span>
              </a>
            </li>
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="../../course/create" aria-expanded="false">
                <span>
                  <i class="ti ti-list-numbers"></i>
                </span>
                <span class="hide-menu">Courses</span>
              </a>
            </li>
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="../../faculty/create" aria-expanded="false">
                <span>
                  <i class="ti ti-school"></i>
                </span>
                <span class="hide-menu">Faculty</span>
              </a>
            </li>
            
            <!-- <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Fees Sturcture</span>
              </a>
            </li> -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="../../batch/create" aria-expanded="false">
                <span>
                  <i class="ti ti-clock-2"></i>
                </span>
                <span class="hide-menu">Batch</span>
              </a>
            </li>
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="../../students" aria-expanded="false">
                <span>
                  <i class="ti ti-user-search"></i>
                </span>
                <span class="hide-menu">Student Register</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./student_details" aria-expanded="false">
                <span>
                  <i class="ti ti-address-book"></i>
                </span>
                <span class="hide-menu">Student Details</span>
              </a>
            </li>
             <li class="sidebar-item">
              <a class="sidebar-link" href="../../addfees" aria-expanded="false">
                <span>
                  <i class="" > ₹ </i>&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                <span class="hide-menu">Student Fees</span>
              </a>
            </li>
            <!-- <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">EXTRA</span>
            </li> -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="../../fetchapplycourses" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Student Course Request</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../../course_request_delete" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Student Course Delete</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./showcontact" aria-expanded="false">
                <span>
                  <i class="ti ti-address-book"></i>
                </span>
                <span class="hide-menu">Student Contacts</span>
              </a>
            </li>
            
            
          </ul>
          <!-- <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
              <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
              </div>
              <div class="unlimited-access-img">
                <img src="{{asset('assets/images/backgrounds/rocket.png')}}" alt="" class="img-fluid">
              </div>
            </div>
          </div> -->
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <p target="_blank" class="btn mt-3 btn-warning">{{SESSION('admin_username')}}</p>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{asset('assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="{{asset('admin_logout')}}" class="btn btn-outline-warning mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      @yield("content")
  <div class="py-6 px-6 text-center">
          <!-- <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script> -->
  <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <script src="{{asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{asset('assets/js/dashboard.js')}}"></script>
  <!-- Page level plugins -->


</body>

</html>