<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload file</title>
</head>
<body>
    @if(Session::has('error'))
        <i>{{Session::get('error')}}</i>
    @endif
    <form action="{{route('post-upload')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="avatar[]" multiple>
        <button type="submit">Upload</button>
    </form>
</body>
</html>