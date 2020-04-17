<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
</head>
<body>
<h1>{{ $pageName }}</h1>
<form method="post" action="/updatetb/{{$value->id}}">
    @method('PATCH')
    @csrf
    <input type="hidden" name="id" value="{{ $value->id }}">
    <p>
        <label for="name">Name</label><br>
        <input type="text" name="name" value="{{ $value->name }}">
    </p>

    <p>
        <label for="ison">Is On</label><br>
        <input type="text" name="isOn" value="{{ $value->isOn }}">
    </p>

    <p>
        <label for="ip_address">ip address</label><br>
        <input type="text" name="ip_address" value="{{ $value->ip_address }}">
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