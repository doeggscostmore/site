@extends('layouts.app')

@section('title', 'Methodology | Do Eggs Cost More?')


@section('head')
    <link rel="canonical" href="{{ url('/methodology') }}" />
@endsection

@section('content')
    <div class="page">
        <div class="hero" id="hero-img">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <h1>Methodology</h1>
                    </div>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/about">About</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Methodology</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>
                        The methodology and data on this site is presented as
                        accurately as I can, but I'm not a statistician and
                        errors may exist.  Please do not rely on this data to
                        make policy, make life alerting decisions, or similar.
                    </p>
                    
                    <h4>Where Does The Data Come From</h4>
                    <p>
                        All data on this site comes from either the Consumer
                        Price Index or Producer Price Index calculated by the
                        Bureau of Labor Statistics.  Data is released on all
                        products Monthly.
                    </p>
                    <p>
                        The data is a <a
                        href="https://en.wikipedia.org/wiki/Price_index"
                        rel="noreferrer nofollow">Price Index</a>, which means
                        it's a normalized sample of prices for a given product.
                        A specific product is not tracked, but a group of
                        products is tracked and weighted by smart people.
                    </p>
                    <p>
                        The bottom line, though, is that when a price index
                        increases 10%, the average price of that product has
                        also increased 10%.
                    </p>

                    <h4>Is the data realtime?</h4>
                    <p>
                        No, the BLS releases data once per month, usually around
                        the middle of the month for the last calendar month. For
                        example, November's data is released in Mid-December.
                        The data is also subject to revision for 4 months after
                        it's release, and we'll update our site should the data
                        be updated.
                    </p>

                    <h4>Disclaimers</h4>
                    <p>
                        This site isn't run by an economist, so inaccuracies
                        (though not intentional) may exist in the calculations
                        or methodology.  The data, though provided by the BLS,
                        can also be inaccurate nor can the BLS verify the data
                        once it's stored elsewhere.
                    </p>

                    <p>
                        Should you want to, we share the BLS series ID(s) for
                        each product.  You can download this raw data from the
                        BLS directly to validate the data.
                    </p>

                    <p>
                        It should go without saying, but this website is
                        presented in a good-faith effort to highlight prices,
                        but it's accuracy cannot be absolutely ensured.  Errors
                        may exist, data may be old and not fully updated, or
                        other issues may cause the values on the site to not be
                        accurate.
                    </p>
                    <p>
                        Do not rely on this site to make purchase decisions,
                        investments, other other important decisions.
                    </p>

                    <h4>Is there an API?</h4>
                    <p>
                        No, for multiple reasons.  The biggest being that the
                        data is available directly from the BLS website for
                        free, so it doesn't make sense to query a secondhand
                        copy of this primary data.  If you need this data, just
                        go get it from the BLS.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @include('layouts/footer')
            </div>
        </div>
    </div>
@endsection
