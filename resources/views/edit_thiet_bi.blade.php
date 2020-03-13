<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
</head>
<body>
<h1>{{ $pageName }}</h1>
<form method="post" action="/web_dieu_khien/public/updatetb/{{$value->id}}">
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
        <label for="comment">Comment</label><br>
        <input type="text" name="comment" value="{{ $value->comment }}">
    </p>
    

    <p>
        <button type="submit">Edit</button>
    </p>
</form>
</body>
</html>