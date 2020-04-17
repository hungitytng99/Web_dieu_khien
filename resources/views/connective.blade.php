<!DOCTYPE html>
<html>
<head>
    <title>trang quan ly ket noi</title>
</head>
<style type="text/css">
    h1 {
        color: darkred;
        font-family: courier;
        font-size: 250%;
    }
    h3 {
        color: darkred;
        font-family: courier;
        font-size: 150%;
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
    <html>
    @include('title')
    </html>
    <h1>CONNECTIVE MANAGEMENT </h1>
    
    <div class="col-md-6 col-xs-offset-3" style="margin-top:30px;">
        <form action="/addcn" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="panel panel-info">
              <div class="panel-heading" style="margin-top: 20px; color: darkred;">
                ADD CONNECTIVE
              </div>
              <div class="panel-body">
                <div class="col-md-112" style="margin-top: 20px; color: darkred;">
                  <div class="col-md-4">
                    ID user
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="idus" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-112" style="margin-top: 20px; color: darkred;">
                  <div class="col-md-4">
                    ID device
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="idtb" class="form-control" required>
                  </div>
                </div>
                
                <div class="col-md-12" style="margin-top: 10px; color: darkred;">
                  <div class="col-md-3 col-xs-offset-4">
                  <input type="submit" class="btn btn-info" style="color: darkred;" value="ADD">
                  </div>
                </div>
              </div>
            </div>
            @if (session('success'))
                <div class="alert alert-danger" role="alert" style="color:Tomato">
                    {{ session('success') }}
                </div>
            @endif
		</form>
	</div> 
	<div class="panel-heading" style="margin-top: 20px; color: darkred;">
        LIST CONNECTIVE
  </div>
	<table border="1" style="margin-top: 30px;">
    	<thead>
        	<tr>
            	<th>ID user</th>
            	<th>User name</th>
            	<th>ID device</th>
            	<th>Device</th>
                <th>Tool</th>
            	
        	</tr>
    	</thead>
    	</tbody>
            <?php foreach ($cn as $value) {?>
            <tr>
                <td><?php echo $value->id_us;?> </td>
                <td><?php echo $value->username;?> </td>
                <td><?php echo $value->id_tb;?> </td>
                <td><?php echo $value->name;?> </td>
                <td><a href="/deletecn/{{$value->id_cn}}">Delete</a></td>
            </tr>
              <?php } ?>
        </tbody>
    </table>

	<div class="panel-heading" style="margin-top: 20px; color: darkred;">
    LIST USER
  </div>
	<table border="1" style="margin-top: 30px;">
    	<thead>
        	<tr>
            	<th>ID</th>
            	<th>username</th>
            	<th>password</th>
            	<th>comment</th>
            	
        	</tr>
    	</thead>
    	</tbody>
            <?php foreach ($user as $value) {?>
            <tr>
                <td><?php echo $value->id;?> </td>
                <td><?php echo $value->username;?> </td>
                <td><?php echo $value->password;?> </td>
                <td><?php echo $value->comment;?> </td>
                
            </tr>
              <?php } ?>
        </tbody>
    </table>
	<div class="panel-heading" style="margin-top: 20px; color: darkred;">
    LIST DEVICE
  </div>
	<table border="1" style="margin-top: 30px;">
    	<thead>
        	<tr>
            	<th>ID</th>
            	<th>Name</th>
            	<th>isOn</th>
            	<th>ip_address</th>
            	
        	</tr>
    	</thead>
    	</tbody>
            <?php foreach ($st as $value) {?>
            <tr>
                <td><?php echo $value->id;?> </td>
                <td><?php echo $value->name;?> </td>
                <td><?php echo $value->isOn;?> </td>
                <td><?php echo $value->ip_address;?> </td>
                
            </tr>
              <?php } ?>
        </tbody>
    </table>

</body>

</html>