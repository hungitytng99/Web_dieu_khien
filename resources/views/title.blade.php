<!DOCTYPE html>
<html>
<head>
    <title>title</title>
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
    <div class="pull-right" style="margin-top: 30px;font-family: courier; font-size: 150%;">
        <a class="btn btn-primary" href="/homead">CONTROL PAGE</a>
        <a class="btn btn-primary" href="/admin_user">USER MANAGEMENT</a>
        <a class="btn btn-primary" href="/admin_thiet_bi"> DEVICE MANAGEMENT </a>
        <a class="btn btn-primary" href="/connective">CONNECTIVE MANAGEMENT</a>
    </div>
    <div class="pull-right" style="margin-top: 5px;font-family: courier;font-size: 75%;"><a class="btn btn-primary" href="http://localhost:8000/logout">LOGOUT</a></div>

</body>
</html>