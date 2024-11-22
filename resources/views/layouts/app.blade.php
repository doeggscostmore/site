<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="google-adsense-account" content="ca-pub-3722637490494929">

    @yield('head')

    @vite('resources/css/app.scss')
    @vite('resources/css/vendor.scss')
</head>

<body>
    @yield('content')

    <!-- Cookie consent modal -->
    <div id="consent-banner" class="alert alert-info alert-dismissible fade" role="alert">
        <div class="row">
            <p>
                This website uses cookies and collects some data about your
                visit. <br /> <a href="/privacy">See Our Privacy Policy</a> or <b><a
                href="#" id="optoutpopup">Opt Out</a></b>.
            </p>

            <button type="button" class="btn-close" aria-label="Close" id="optoutdismiss"></button>
        </div>
    </div>

    <!-- Include google before our scripts so we can reference stuff in our consent functions -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8QXKWX543K"></script>
    @vite('resources/js/app.js')

    <!-- Generated {{ date('c') }} -->
</body>

</html>
