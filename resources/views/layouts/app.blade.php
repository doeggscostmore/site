<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="google-adsense-account" content="ca-pub-3722637490494929">

    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/img/favicon.png') }}">

    @yield('head')

    @vite('resources/css/app.scss')
    @vite('resources/css/vendor.scss')
</head>

<body>
    <!-- Off Canvas Nav -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" data-bs-keyboard="false"
        data-bs-backdrop="false">

        <div class="offcanvas-header d-none d-sm-flex">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body px-0">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#productsmenu" role="button" aria-expanded="false" aria-controls="productsmenu">Products</span>
                    <ul class="nav collapse" id="productsmenu">
                        @foreach ($categories as $category)
                            <li class="nav-item" ><a class="nav-link" href="{{ url("/prices/$category->slug") }}/">{{ ucwords($category->name) }}</a></li>
                        @endforeach
                    </ul>
                </li>

            </ul>
        </div>
    </div>

    <!-- Fixed position navbar -->
    <div class="container d-flex flex-row-reverse fixed-nav">
        <button class="hamburger hamburger--arrow" id="hamburger" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvas" aria-controls="offcanvas">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>

    @yield('content')

    <!-- Cookie consent modal -->
    <div id="consent-banner" class="alert alert-info alert-dismissible fade" role="alert">
        <div class="row">
            <p>
                This website uses cookies and collects some data about your
                visit. <br /> <a href="/privacy">See Our Privacy Policy</a> or <b><a href="#" id="optoutpopup">Opt
                        Out</a></b>.
            </p>

            <button type="button" class="btn-close" aria-label="Close" id="optoutdismiss"></button>
        </div>
    </div>

    <!-- Include google before our scripts so we can reference stuff in our consent functions -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8QXKWX543K"></script>
    @vite('resources/js/vendor.js')
    @vite('resources/js/app.js')

    <!-- Generated {{ date('c') }} -->
</body>

</html>
