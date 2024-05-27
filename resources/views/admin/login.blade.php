<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gayatri Infotech</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <script>
        //sweetalert function
        function showSweetAlert(t,e,i){Swal.fire({title:title,text:text,icon:type})}
        //sweetalert toast
        function toast(e,t){const i=Swal.mixin({toast:!0,position:"top-end",showConfirmButton:!1,timer:3e3,timerProgressBar:!0,didOpen:e=>{e.addEventListener("mouseenter",Swal.stopTimer),e.addEventListener("mouseleave",Swal.resumeTimer)}});i.fire({icon:e,title:t})}
    </script>
</head>

<body>

<!-- @if(Session::has('success'))
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
  @endif -->

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-4 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <div class="text-center">
                  <img src="{{asset('assets/images/logos/gayatri.png')}}" class="text-center" width="70%" height="120px" alt="" />
                </div>
                <!-- <a  class="text-nowrap logo-img text-center d-block py-3 w-100" style="font-size:35px;color:#FFAE1F;font-weight:bolder;">                
                </a> -->
                <!-- <p class="text-center">Gayatri Infotech</p> -->
                <form action="/admin_logins" method="post">
                  @csrf
                  <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter Valid Email ID" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small class="" style="color:red">@error('email'){{$message}} @enderror</small>
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="*****" name="password" id="exampleInputPassword1">
                    <small class="" style="color:red">@error('password'){{$message}} @enderror</small>
                  </div>

                  <button class="btn btn-warning w-100 py-8 fs-4 mt-3 rounded-2">Sign In</button>
                  <!-- <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New to Gayatri?</p>
                    <a class="text-warning fw-bold ms-2" href="./register">Create an account</a>
                  </div> -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>