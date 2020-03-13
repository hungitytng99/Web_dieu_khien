
<!DOCTYPE html>
<html>
<head>
    <title>trang quan ly thiet bi</title>
</head>
<style type="text/css">
    h1 {
        color: darkred;
        font-family: courier;
        font-size: 250%;
    }
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
</style>
<body>
    <h1>QUẢN LÝ THIẾT BỊ </h1>
    
    <div class="col-md-6 col-xs-offset-3" style="margin-top:50px;">
        <form action="/web_dieu_khien/public/addtb" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="panel panel-info">
              <div class="panel-heading" style="margin-top: 10px; color: darkred;">
                ADD DEVICE
              </div>
              <div class="panel-body">
                <div class="col-md-112" style="margin-top: 20px; color: darkred;">
                  <div class="col-md-4">
                    ID
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="id" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-112" style="margin-top: 20px; color: darkred;">
                  <div class="col-md-4">
                    name
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="name" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-112" style="margin-top: 20px; color: darkred;">
                  <div class="col-md-4">
                    IsOn
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="isOn" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-112" style="margin-top: 20px; color: darkred;">
                  <div class="col-md-4">
                    comment
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="comment" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-12" style="margin-top: 10px; color: darkred;">
                  <div class="col-md-3 col-xs-offset-4">
                  <input type="submit" class="btn btn-info" style=" color: darkred;" value="ADD">
                  </div>
                </div>
              </div>
            </div>
        </form>
    </div> 

    <table border="1" style="margin-top: 30px;">
    	<thead>
        	<tr>
            	<th>ID</th>
            	<th>Name</th>
            	<th>isOn</th>
            	<th>comment</th>
            	<th>Tools</th>
        	</tr>
    	</thead>
    	</tbody>
            <?php foreach ($st as $value) {?>
            <tr>
                <td><?php echo $value->id;?> </td>
                <td><?php echo $value->name;?> </td>
                <td><?php echo $value->isOn;?> </td>
                <td><?php echo $value->comment;?> </td>
                <td> <a href="http://localhost/web_dieu_khien/public/edittb/{{$value->id}}">Edit</a> | <a href="http://localhost/web_dieu_khien/public/deletetb/{{$value->id}}">Delete</a></td>
            </tr>
              <?php } ?>
        </tbody>
    </table>
    <div class="pull-right" style="margin-top: 50px;font-family: courier;"><a class="btn btn-primary" href="http://localhost/web_dieu_khien/public/logout">LOGOUT</a></div>
</body>

</html>
