<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
</head>
<body>
    <h2>This is Header</h2>
    {!!$menu!!}
    <hr>
    @yield('menu')
    <div>
        <ul>
            <li>PHP</li>
            <li>HTML</li>
        </ul>
    </div>
    @yield('content')
    <hr>
    <h2>This is Footer</h2>
</body>
</html>