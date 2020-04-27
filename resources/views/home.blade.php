
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home controller</title>
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style type="text/css">
    .button1 {
      background-color: indianred;
      border: none;
      color: white;
      padding: 15px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 15px;
      margin: 10px 50px;
      cursor: pointer;
      border-radius: 12px;
    }
</style>
<body>
  
  <div class="limiter">

    <div class="container-login100" style="background-image: url('/images/bg-01.jpg');">
        
        <form class="login100-form validate-form p-b-33 p-t-5" action="" method="post">
                <a class="login100-form-btn" style="font-size: 75%;float:right;" href="/logout">LOGOUT</a>
                <a class="login100-form-btn" style="font-size: 75%;float:right;" href="/creat_register">G2a</a>
                <span  style="color: darkred; font-family: courier; font-size: 300%;margin: 50px 50px; ">
                    DEVICE CONTROLLER
                </span>

                <table style="margin: 50px 50px;">
                        <?php foreach ($st as $value) {?>
                        <tr>
                            <td> <?php echo $value->name;?></td>
                            <td> 
                                 <label class="switch">
                                    <?php if($value->isOn==0){ ?>
                                    <input class="switch-input" type="checkbox" name ="{{ $value->id }}"/>
                                    <?php }
                                    else { ?>
                                    <input class="switch-input" type="checkbox" checked name ="{{ $value->id }}" />
                                    <?php } ?>
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                </label> 
                            </td>
                            <td> <?php 
                                if($value->ip_address!=NULL){
                                    $user=$value->user;
                                    $ip=$value->ip_address;
                                    $name=shell_exec("ssh $user@$ip -t who");
                                    
                                    $array=explode("\n", $name);
                                    
                                    $n=count($array);
                                    for($i=0; $i<$n; $i++){
                                        $array[$i]=explode(' ', $array[$i]);
                                    }
                                    for($i=0; $i<count($array); $i++){
                                        for($j=$i+1; $j<count($array); $j++){
                                            if(($array[$i][0]===$array[$j][0])&&($array[$i][count($array[$i])-1]===$array[$j][count($array[$j])-1])) {
                                                $array[$i][0]="";
                                                $n--;
                                            }
                                        }
                                    }
                                    echo $n-1   ;
                                    echo "<br>";
                                    for($i=0; $i<count($array); $i++){
                                        if($array[$i][0]===""){}else {echo $array[$i][0];echo $array[$i][count($array[$i])-1] ; echo "<br>";}
                                    }
                                }
                            ?>   
                            </td>
                        </tr>
                          <?php } ?>

                    
                </table>
                
                @if (session('success'))
                      <div class="alert alert-danger" role="alert" style="color: Tomato ; margin: 0px 50px;">
                          {{ session('success') }}
                      </div>
                @endif
                
                @csrf
                
                <button class="button1" type="submit" >
                Change
                </button>
            </div>
            @csrf
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





