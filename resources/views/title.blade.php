<!DOCTYPE html>
<html>
<head>
    <title>title</title>
    <meta charset="UTF-8">
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
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
</style>
<body>
    <!-- <div  style="margin-top: 2px; font-size: 150%;">
        <a class="login100-form-btn" style="font-size: 75%;float:right;" href="/logout">LOGOUT</a>
        <a class="login100-form-btn" style="font-size: 75%;float:right;" href="/creat_register">G2a</a>
        <a class="login100-form-btn" style="font-size: 75%;float:right;" href="/connective">CONNECTIVE MANAGEMENT</a>
        <a class="login100-form-btn" style="font-size: 75%;float:right;" href="/admin_thiet_bi"> DEVICE MANAGEMENT </a>
        <a class="login100-form-btn" style="font-size: 75%;float:right;" href="/admin_user">USER MANAGEMENT</a>
        <a class="login100-form-btn" style="font-size: 75%;float:right;" href="/homead">CONTROL PAGE</a> -->
        
        <div class="login100-form-btn" style="font-size: 150%;float:right;margin: 20px 20px 20px 50px">
            <button  type="button" data-toggle="dropdown">Option
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li class="dropdown-header">Controller</li>
                <li><a href="/homead">CONTROL HOME</a></li>
                <li><a href="/admin_user">USER MANAGEMENT</a></li>
                <li><a href="/admin_thiet_bi">DEVICE MANAGEMENT</a></li>
                <li><a href="/connective">CONNECTIVE MANAGEMENT</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Setting</li>
                <li><a href="/creat_register">G2a</a></li>
                <li><a href="/logout">LOGOUT</a></li>
            </ul>
        </div>

    <!-- </div> -->
    
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