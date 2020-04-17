
<!DOCTYPE html>
<html>
<head>
    <title>Web dieu khien</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
</head>
<style type="text/css">
    h1 {
        color: darkred;
        font-family: courier;
        font-size: 250%;
    }
    a:link, a:visited {
        background-color: indianred;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    a:hover, a:active {
        background-color: darkred;
    }
</style>
<body>
    
    <h1>DEVICE CONTROLLER</h1>
    <form action="" method="post">
    <table>
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
                    $ip=$value->ip_address;
                    $name=shell_exec("ssh $ip -t who");
                    
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
          <div class="alert alert-danger" role="alert" style="color:Tomato">
              {{ session('success') }}
          </div>
    @endif
    <input type="submit" value="Change" style="margin-top: 20px;color: darkred;font-family: courier;"> </input>
    @csrf
    </form>
    <div class="pull-right" style="margin-top: 50px;font-family: courier;"><a class="btn btn-primary" href="/logout">LOGOUT</a></div>

</body>
<!-- checked -->
</html>
