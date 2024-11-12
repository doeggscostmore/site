@extends('layouts.app')

@section('title', 'Methodology | Do Eggs Cost More?')

@section('content')
    <div class="page">
        <div class="hero">
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
                        accurattly as I can, but I'm not a statistician and
                        errors may exist.  Please do not rely on this data to
                        make policy, make life alerting decisions, or similar.
                    </p>
                    
                    <h4>Where Does The Data Come From</h4>
                    <p>
                        The data on this site is collected from a public price
                        API of a national grocery chain, and is collected twice
                        per day.  Things like out of stock products and
                        promotional pricing are noted in the raw data collected,
                        but are not shown on the site currently.
                    </p>
                    <p>
                        I don't share the specific retailer as it's immaterial
                        to the point I'm trying to make.  This shouldn't be a
                        tracker for a specific product in a specific place,
                        rather it's intended to be general tracker for the
                        average price of items.
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
                        The products were intended to be reprentative of both
                        name brand and store brand items and common types of
                        each.  Generic names are used as, again, this site is
                        intended to be a general overview and not for specific
                        products.
                    </p>

                    <h4>Accessing Raw Data</h4>
                    <p>
                        There is no API for this site ... yet.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <footer>
                    &copy; 2024. | <a href="/about">About<a> <br />
                    Photo by <a href="https://unsplash.com/@helloimnik?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash" rel="noopener noreferrer">Nik</a> on <a href="https://unsplash.com/photos/brown-eggs-in-a-box-LUYD2b7MNrg?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash"  rel="noopener noreferrer">Unsplash</a>
                </footer>
            </div>
        </div>
    </div>
@endsection
