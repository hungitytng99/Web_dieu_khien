

<!DOCTYPE html>
<html>
<head>
    <title>trang quan ly user</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style type="text/css">
    
    table {
      width:80%;
    }
    table, th, td {
      border: 1px solid darkred;
      border-collapse: collapse;
    }
    th, td {
      padding: 15px;
      text-align: left;
    }
    table tr:nth-child(even) {
      background-color: moccasin;
    }
    table tr:nth-child(odd) {
      background-color: #fff;
    }
    table th {
      background-color: lightcoral;
      color: white;
    }
    a:link, a:visited {
        background-color: indianred;
        color: white;
        padding: 10px 20px;
        margin: 10px 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 12px;
    }

    a:hover, a:active {
        background-color:lightcoral;
    }

    .button1 {
      background-color: indianred;
      border: none;
      color: white;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 15px;
      margin: 10px 50px;
      cursor: pointer;
      border-radius: 8px;
    }
    .input1 {
      width: 20%;
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
        
      <form class="login100-form validate-form p-b-33 p-t-5" action="/addus" method="post" >
        @include('title')
        <span  style="color: darkred; font-family: courier; font-size: 300%;margin: 50px 50px; font-weight: bold; ">
                    USER MANAGEMENT
        </span>
    
        <div class="col-md-6 col-xs-offset-3" style="margin-top:50px;">
      
          
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="panel panel-info">
              <div class="panel-heading" style="margin: 10px 50px; font-size: 150%; color: darkred;">
                ADD USER
              </div>
              <div class="panel-body">
                
                <div class="col-md-112" style="margin: 10px 50px;  color: darkred;">
                  <div class="col-md-4">
                    username
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="username" class="input1" autofocus placeholder="User name"  required >
                  </div>
                </div>
                <div class="col-md-112" style="margin: 10px 50px;  color: darkred;">
                  <div class="col-md-4">
                    full name
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="fullname" class="input1" autofocus placeholder="Full name" required>
                  </div>
                </div>
                <div class="col-md-112" style="margin: 10px 50px;  color: darkred;">
                  <div class="col-md-4">
                    email
                  </div>
                  <div class="col-md-8">
                    <input id="email" type="email" class="input1 @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus placeholder="Email" class="form-control" required>


                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
                <div class="col-md-112" style="margin: 10px 50px;  color: darkred;">
                  <div class="col-md-4">
                    password
                  </div>
                  <div class="col-md-8">
                    <input id="password" type="password" class="input1 @error('password') is-invalid @enderror" name="password" autofocus placeholder="Password" class="form-control" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert" style="color:Tomato; margin: 0px 50px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                </div>
                
                <button class="button1" type="submit"  >
                          ADD
                </button>
              </div>
            </div>
            @if (session('success'))
                <div class="alert alert-danger" role="alert" style="color:Tomato; margin: 0px 50px;">
                    {{ session('success') }}
                </div>
            @endif            
		
	</div> 

    
    <table border="1" style="margin: 50px 50px;">
    	<thead>
        	<tr>
            	<th>ID</th>
            	<th>Full name</th>
            	<th>Email</th>
            	<th>Tools</th>
        	</tr>
    	</thead>
    	</tbody>
            <?php foreach ($user as $value) {?>
            <tr>
                <td><?php echo $value->id;?> </td>
                <td><?php echo $value->fullname;?> </td>
                <td><?php echo $value->email;?> </td>
                <td> <a href="/editus/{{$value->id}}">Edit</a>  <a href="/deleteus/{{$value->id}}">Delete</a></td>
            </tr>
              <?php } ?>
        </tbody>
    </table>
</form>
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
