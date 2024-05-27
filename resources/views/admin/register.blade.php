<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-6 col-lg-5 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
              <div class="text-center">
                  <img src="{{asset('assets/images/logos/gayatri.png')}}" class="text-center" width="70%" height="120px" alt="" />
                </div>
                <form action="{{route('register.store')}}" method="post">
                    @csrf
                  <div class="mb-2">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" name="name" placeholder="Enter Your Full Name" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                    <small class="" style="color:red">@error('name'){{$message}} @enderror</small>
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputtext1" class="form-label">Mobile No</label>
                    <input type="text" name="mobileno" placeholder="8855921085" maxlength="10" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                    <small class="" style="color:red">@error('mobileno'){{$message}} @enderror</small>
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="text" name="email" placeholder="Enter Valid Email ID" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small class="" style="color:red">@error('email'){{$message}} @enderror</small>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="text" placeholder="*****" name="password" class="form-control" id="exampleInputPassword1">
                    <small class="" style="color:red">@error('password'){{$message}} @enderror</small>
                  </div>
                  <button  class="btn btn-sm btn-warning text-center w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-warning fw-bold ms-2" href="./login">Sign In</a>
                  </div>
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