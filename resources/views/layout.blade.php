<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JobHub</title>
</head>
<body>
    <h1>JobHub</h1>

    {{-- @yield -> it will be replaced by the content of the view that extends this layout --}}
    @yield('content')

    <footer>
        &copy; JobHub {{date('Y')}}
    </footer>
</body>
</html>