<!DOCTYPE html>
<html>
<head>
    <title>Web dieu khien</title>
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
    <h1>PAGE HOME BẬT TẮT CÔNG TẮC !!</h1>
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
            </tr>
              <?php } ?>

        
    </table>
    <input type="submit" value="Change" style="margin-top: 20px;color: darkred;font-family: courier;"> </input>
    @csrf
    </form>
    <div class="pull-right" style="margin-top: 50px;font-family: courier;"><a class="btn btn-primary" href="http://localhost/web_dieu_khien/public/logout">LOGOUT</a></div>

</body>
<!-- checked -->
</html>
