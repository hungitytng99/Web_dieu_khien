
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit user</title>
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
<style type="text/css">
    .button1 {
      background-color: indianred;
      border: none;
      color: white;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 15px;
      margin: 10px 10px;
      cursor: pointer;
      border-radius: 8px;
    }
    .input1 {
      width: 95%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid darkred;
      outline: none;
    }

    .input1:focus {
      background-color:lightcoral;
    }
</style>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('/images/bg-01.jpg');">

      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41">
          Edit user
        </span>
        

        <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="/updateus/{{$value->id}}">


            @method('PATCH')
            @csrf
            
            <p>
                <div class="col-md-4" style="margin: 10px 10px;  color: darkred;">
                    User name
                </div>
                <input class="input1" style="margin: 10px 10px"; type="text" name="username" value="{{ $value->username }}">
            </p>

            <p>
                <div class="col-md-4" style="margin: 10px 10px;  color: darkred;">
                    Full name
                </div>
                <input class="input1" style="margin: 10px 10px"; type="text" name="fullname" value="{{ $value->fullname }}">
            </p>
            <p>
                <div class="col-md-4" style="margin: 10px 10px;  color: darkred;">
                    Email
                </div>
                <input class="input1" style="margin: 10px 10px"; id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $value->email }}" required autocomplete="email" autofocus placeholder="Email" class="form-control" required>
                @error('email')
                    <span class="invalid-feedback" style="margin: 10px 10px; role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </p>
            <p>
                <div class="col-md-4" style="margin: 10px 10px;  color: darkred;">
                    Password
                </div>
                <input class="input1" style="margin: 10px 10px"; id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" style="margin: 10px 10px; role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </p>
                @if (session('error'))
                  <div class="alert alert-danger" style="margin: 10px 10px; role="alert" style="color:Tomato">
                      {{ session('error') }}
                  </div>
                @endif

            <p>
                <button class="button1" type="submit">Edit</button>
            </p>
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




