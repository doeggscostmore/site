<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Core / Vendor styles -->
    @vite('resources/css/bootstrap.scss')
    @vite('resources/css/fonts.scss')

    <!-- App styles -->
    @vite('resources/css/app.scss')
</head>

<body>
    @yield('content')

    <!-- Core / Vendor scripts -->
    @vite('resources/js/bootstrap.js')

    <!-- App scripts -->
    @vite('resources/js/app.js')
</body>

</html>
