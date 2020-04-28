
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login controller</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo asset('images/icons/favicon.ico') ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo asset('vendor/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('vendor/animate/animate.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('vendor/css-hamburgers/hamburgers.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('vendor/animsition/css/animsition.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('vendor/select2/select2.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('vendor/daterangepicker/daterangepicker.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('css/util.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('css/main.css') ?>">
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('/images/bg-01.jpg');">

      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41">
          Login
        </span>
        

        <form class="login100-form validate-form p-b-33 p-t-5" action="" method="post">


          <div class="wrap-input100 validate-input" data-validate = "Enter username">
            <input class="input100" type="text" name="username" placeholder="User name">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>
          <div class="pull-left" style="margin-top: 20px;font-family: courier; font-size: 150%;">
            <a class="btn btn-primary" style="font-size: 20px;"  href="/myregister">     REGISTER</a>
          </div>
        @if (session('error'))
          <div class="pull-left" role="alert" style="color:Tomato">
              {{ session('error') }}
          </div>
        @endif
          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn">
              Login
            </button>
          </div>
          @csrf
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendor/animsition/js/animsition.min.js"></script>
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <script src="js/main.js"></script>

</body>
</html>