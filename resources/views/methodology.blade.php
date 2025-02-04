@extends('layouts/content')

@section('page_title', 'Methodology')

@section('head')
    <link rel="canonical" href="{{ route('methodology') }}" />
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/about">About</a></li>
            <li class="breadcrumb-item active" aria-current="page">Methodology</li>
        </ol>
    </nav>
@endsection

@section('page_content')
    <p>
        The methodology and data on this site is presented as accurately as I
        can, but I'm not a statistician and errors may exist. Please do not rely
        on this data to make policy, make life alerting decisions, or similar.
    </p>

    <h4>Where Does The Data Come From</h4>
    <p>
        Data on this site can come from four sources, depending on which product
        and and summary you're looking at.  The four sources are:
    </p>
    <ul>
        <li>The Consumer Price Index</li>
        <li>The Producer Price Index</li>
        <li>The US Energy Information Administration</li>
        <li>Prices scraped from a public grocery chain's API</li>
    </ul>

    <h5>CPI/PPI Data</h5>
    <p>
        This data is published monthly, and data is usually delayed a few weeks
        (February's data is available in mid-March).
    </p>
    <p>
        This data is maintained by the Bureau of Labor Statistics, and they are
        both Price Indexes.  A <a
        href="https://en.wikipedia.org/wiki/Price_index" rel="noreferrer
        nofollow">Price Index</a> tracks the average cost of a standard set of
        goods in a particular category, and is the most often cited metric to
        track inflation.
    </p>
    <p>
        The value here doesn't represent the exact cost, but the relative cost.
        If the CPI increases 10%, though, the average cost of goods in that
        category have also increased 10%.
    </p>
    <p>
        This data is used when making most comparisons on the site.  It has the
        most complete data that goes back the furthest, but is also the slowest
        to update.
    </p>

    <h5>EIA Data</h5>
    <p>
        This data is the average price of Regular, Premium and Diesel fuel in
        the US.  It's updated Weekly and is the actual average price for fuel,
        not a price index.
    </p>
    <p>
        We use this on the Gas overview page to show changes in the last week.
    </p>

    <h5>Grocery Store Data</h5>
    <p>
        We also crawl the API of a national grocery store chain for the price of
        a sample of products.  For most categories, we sample 3-5 different
        products ranging from store brand to name brand and get the prices at
        many store locations.
    </p>
    <p>
        The same products are sampled across all stores, and the same products
        are sampled each day.  Specific products or the chain we're scraping are
        not shared as they are immaterial to the data on the page.
    </p>
    <p>
        This data is collected daily, and the prices exclude promotional or sale
        prices.  The average of these prices is used on product overview pages
        to show the current price and changes in the last week.
    </p>

    <h4>What Calculations We Do</h4>
    <p>
        The numbers we share all generally are just the percentage change
        between the start and end of a time period.  The time period may be 6
        months, a year, or a week and is called out next to each percentage.
    </p>
    <p>
        We don't adjust or modify the data in any other way.
    </p>

    <h4>Disclaimers</h4>
    <p>
        This site isn't run by an economist, so inaccuracies (though not
        intentional) may exist in the calculations or methodology.
    </p>
    <p>
        It should go without saying, but this website is presented in a
        good-faith effort to highlight prices, but it's accuracy cannot be
        absolutely ensured. Errors may exist, data may be old and not fully
        updated, or other issues may cause the values on the site to not be
        accurate.
    </p>
    <p>
        Do not rely on this site to make purchase decisions, investments, other
        other important decisions.
    </p>

    <h4>Is there an API?</h4>
    <p>
        Not currently.  If there's interest, I can make the raw data available
        via and API.
    </p>

@endsection
