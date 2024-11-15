<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('head')

    @vite('resources/css/app.scss')
</head>

<body>
    @yield('content')

    <!-- Include google before our scripts so we can reference stuff in our consent functions -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8QXKWX543K"></script>
    @vite('resources/js/app.js')

    <!-- Generated {{ date('c') }} -->
</body>

</html>
