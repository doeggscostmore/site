<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.scss')
</head>

<body>
    @yield('content')

    @vite('resources/js/app.js')
</body>

</html>
