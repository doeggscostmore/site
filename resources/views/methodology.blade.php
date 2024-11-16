@extends('layouts.app')

@section('title', 'Methodology | Do Eggs Cost More?')

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
                        The data on the site can come from differrent sources,
                        depending on the product category.
                    </p>
                    <p>
                        All grocery products (milk, eggs, meat, etc) API of a
                        national grocery chain, and is collected daily. Things
                        like out of stock products and promotional pricing are
                        noted in the raw data collected, but are not shown on
                        the site currently.
                    </p>
                    <p>
                        I don't share the specific retailer as it's immaterial
                        to the point I'm trying to make.  This shouldn't be a
                        tracker for a specific product in a specific place,
                        rather it's intended to be general tracker for the
                        average price of items.
                    </p>
                    <p>
                        Fuel price data comes from the US Energy Information
                        Administration's public API.  This data is updated
                        weekly.
                    </p>

                    <h4>What Locations Do We Track</h4>
                    <p>
                        Grocery prices are tracked across the entire operating
                        area of the grocery chain.  They do not operate in all
                        50 states, and I don't see any other primary data
                        sources I can use, so other states are not tracked.
                    </p>
                    <p>
                        Right now, these are the states with data:
                    </p>
                    <ul class="states">
                        <li>SC</li>
                        <li>OH</li>
                        <li>MI</li>
                        <li>IL</li>
                        <li>IN</li>
                        <li>KY</li>
                        <li>VA</li>
                        <li>TX</li>
                        <li>KS</li>
                    </ul>
                    <p>
                        Fuel prices are tracked as the US national average as
                        reported by the EIA.
                    </p>

                    <h4>What Products Do We Track?</h4>
                    <p>
                        For each product, we track at least 3 individual items.
                        The prices of these items are checked at 10 locations
                        across this chain's operating area.  The exact product
                        is checked each time using the store's internal product
                        ID, and they are identical items across all locations.
                    </p>
                    <p>
                        The products were intended to be representative of both
                        name brand and store brand items and common types of
                        each.  In the future, more granular data about products
                        may be shared, but right now only aggregated data is
                        made available.
                    </p>

                    <h4>Is The Data Real-Time?</h4>
                    <p>
                        No.  Through various caches and delays, the data is
                        delayed about 24 hours.  This is partly due to our
                        crawling strategy, but largely due to internal caches we
                        use to speed up the site.
                    </p>

                    <h4>How Far Back Does The Data Go?</h4>
                    <p>
                        New products are added periodically, but the oldest data
                        is from about November 11.  We'll share the exact date
                        any time it's used in a calulation.
                    </p>

                    <h4>Accessing Raw Data</h4>
                    <p>
                        There is no API for this site ... yet.
                    </p>

                    <h4>My Prices Are Higher / Lower!</h4>
                    <p>
                        This data is a sample, your prices may vary off the
                        sample we take.  This site speaks in general terms for
                        that reason.
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
