
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register controller</title>
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
          Set up Google Authenticator
        </span>
        
            <div class="panel-body" style="text-align: center;">
                    <p style="color: white">Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code {{ $secret }}</p>
                    <div>
                        <img src="{{ $QR_Image }}">
                    </div>
                    @if (!@$reauthenticating) {{-- add this line --}}
                        <p style="color: white">Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code {{ $secret }}</p>>You must set up your Google Authenticator app before continuing. You will be unable to login otherwise</p>
                            <div class="container-login100-form-btn m-t-32">
                                <a href="/complete-registration"><button class="login100-form-btn">Complete Registration</button></a>
                            </div>
                    @endif {{-- and this line --}}
            </div>
          
          @csrf
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







<!-- btn-primary


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Set up Google Authenticator</div>

                <div class="panel-body" style="text-align: center;">
                    <p>Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code {{ $secret }}</p>
                    <div>
                        <img src="{{ $QR_Image }}">
                    </div>
                    @if (!@$reauthenticating) {{-- add this line --}}
                        <p>You must set up your Google Authenticator app before continuing. You will be unable to login otherwise</p>
                        <div>
                            <a href="/complete-registration"><button class="login100-form-btn">Complete Registration</button></a>
                        </div>
                    @endif {{-- and this line --}}
                </div>
            </div>
        </div>
    </div>
</div> -->
