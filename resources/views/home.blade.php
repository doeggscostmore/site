@extends('layouts.app')

@section('title')
Do Eggs Cost More? | Grocery Price Tracker
@endsection

@section('head')
    <link rel="canonical" href="{{ url('/') }}" />

    <meta property="og:title" content="Do Eggs Cost More? | Grocery Price Tracker">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url('/') }}">

    <meta property="og:description"
        content="Do Eggs Cost More tracks the price of common products and
        groceries like eggs, milk, energy, and housing and compares them to past
        prices." />
    <meta name="description"
        content="Do Eggs Cost More tracks the price of common products and
        groceries like eggs, milk, energy, and housing and compares them to past
        prices." />
@endsection

@section('content')
    <div class="product home">
        <div class="heading">
            <div class="container overall">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-lg-6">
                        <h1>{{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?</h1>
                        @if ($data->isUp)
                            <h2>Yes.</h2>
                        @else 
                            <h2>No.</h2>
                        @endif
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        @if ($data->isUp)
                            <span class="tagline">
                                The price of eggs has gone in the past 6 months,
                                @if ($upCount)
                                    and {{ $upCount - 1 }} other {{ Str::plural('product', $upCount - 1); }} also cost more.
                                @else
                                    but other prices have not.
                                @endif
                            </span>
                        @else
                            <span class="tagline">
                                The price of eggs has gone down in the last 6 months,
                                @if ($upCount)
                                    but {{ $upCount }} other {{ Str::plural('product', $upCount); }} does cost more.
                                @else
                                    and no other products currently cost more.
                                @endif
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-sm-12 item-list">
                        <div class="row">
                            @foreach ($categories as $category)
                                @php
                                    $summary = $all->firstWhere('slug', $category->slug)
                                @endphp

                                @if (!$summary)
                                    @continue
                                @endif
                                <div class="col-sm-6 col-md-4 item">
                                    @if ($summary->isUp)
                                    <span class="up">
                                        <i class="fa fa-up-long"></i>
                                        <span class="sr-only">Up</span>
                                        {{ abs(number_format($summary->change, 1)) }}%
                                    </span>
                                    @else
                                    <span class="down">
                                        <i class="fa fa-down-long"></i>
                                        <span class="sr-only">Down</span>
                                        {{ abs(number_format($summary->change, 1)) }}%
                                    </span>
                                    @endif

                                    <a href="{{ url("/prices/$category->slug/") }}">{{ ucwords($category->name) }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container divider">
        <hr>
    </div>

    <div class="container feature">
        <div class="row text-center">
            <div class="col-sm-12">
                <h3>Compare Past Prices</h3>
                <p>
                    Soon you'll be able to see the changes at times in the past.
                </p>
            </div>
        </div>
    </div>

    <div class="footer-hero" id="hero-img">
        <div class="overlay">
        </div>
    </div>

    <div class="container">
        <div class="row">
            @include('layouts/footer')
        </div>
    </div>
@endsection
