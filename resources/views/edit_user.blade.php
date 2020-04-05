<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
</head>
<body>
<h1>{{ $pageName }}</h1>
<form method="post" action="/web_dieu_khien/public/updateus/{{$value->id}}">
    @method('PATCH')
    @csrf
    <input type="hidden" name="id" value="{{ $value->id }}">
    <p>
        <label for="username">Username</label><br>
        <input type="text" name="username" value="{{ $value->username }}">
    </p>

    <p>
        <label for="email">Password</label><br>
        <input type="text" name="password" value="{{ $value->password }}">
    </p>

    <p>
        <label for="comment">Comment</label><br>
        <input type="text" name="comment" value="{{ $value->comment }}">
    </p>
        @if (session('error'))
          <div class="alert alert-danger" role="alert" style="color:Tomato">
              {{ session('error') }}
          </div>
        @endif

    <p>
        <button type="submit">Edit</button>
    </p>
</form>
</body>
</html>