

<!DOCTYPE html>
<html>
<head>
    <title>trang quan ly user</title>
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
    <h1>USER MANAGEMENT</h1>
    
    <div class="col-md-6 col-xs-offset-3" style="margin-top:50px;">
        <form action="/addus" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="panel panel-info">
              <div class="panel-heading" style="margin-top: 20px; color: darkred;">
                ADD USER
              </div>
              <div class="panel-body">
                
                <div class="col-md-112" style="margin-top: 20px; color: darkred;">
                  <div class="col-md-4">
                    username
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="username" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-112" style="margin-top: 20px; color: darkred;">
                  <div class="col-md-4">
                    password
                  </div>
                  <div class="col-md-8">
                    <input type="password" name="password" class="form-control" required>
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
                  <input type="submit" class="btn btn-info" value="ADD">
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

    
    <table border="1" style="margin-top: 30px;">
    	<thead>
        	<tr>
            	<th>ID</th>
            	<th>username</th>
            	<th>comment</th>
            	<th>Tools</th>
        	</tr>
    	</thead>
    	</tbody>
            <?php foreach ($user as $value) {?>
            <tr>
                <td><?php echo $value->id;?> </td>
                <td><?php echo $value->username;?> </td>
                <td><?php echo $value->comment;?> </td>
                <td> <a href="/editus/{{$value->id}}">Edit</a>  <a href="/deleteus/{{$value->id}}">Delete</a></td>
            </tr>
              <?php } ?>
        </tbody>
    </table>

    
</body>

</html>
