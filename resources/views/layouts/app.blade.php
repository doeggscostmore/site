<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Core / Vendor styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/vendor/bootstrap/css/bootstrap.min.css') }}" />

    <!-- App styles -->
    @vite('resources/css/app.scss')
</head>

<body>
    @yield('content')

    <!-- Core / Vendor scripts -->
    <script src="{{ asset('build/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- App scripts -->
    @vite('resources/js/app.js')
</body>

</html>
