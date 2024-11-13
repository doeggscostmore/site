@extends('layouts.app')

@section('title')
    {{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?
@endsection

@section('head')
    <link rel="canonical" href="{{ url('/') }}" />

    <meta property="og:title" content=" {{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url('/') }}">

    <meta property="og:description"
        content="Track common grocery item prices and compare them to the price just after the 2024 election." />
@endsection

@section('content')
    <div class="product home">
        <div class="heading">
            <div class="container overall">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-lg-6">
                        <h1>{{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?</h1>
                        @if ($data->change == 0)
                            <h2>Not Really.</h2>
                            <span class="tagline">
                                The prices of {{ $category->name }} hasn't
                                changed since the 2024 Election.
                            </span>
                        @else
                            @if ($data->isUp)
                                <h2>Yes.</h2>
                                <span class="tagline">
                                    The prices of {{ $category->name }} have
                                    gone up <b>{{ round($data->change, 1) }}%</b> since the
                                    2024 Election.
                                </span>
                            @else
                                <h2>No.</h2>
                                <span class="tagline">
                                    The prices of {{ $category->name }} have
                                    gone down <b>{{ round($data->change, 1) }}%</b> since
                                    the 2024 Election.
                                </span>
                            @endif
                        @endif
                    </div>
                    <div class="col-sm-12 col-lg-6 item-list">
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-sm-12 item">
                                    <a href="/{{ $category->slug }}">{{ ucwords($category->name) }} prices</a>

                                    @if ($allStatus[$category->slug]->change == 0)
                                        <span class="down">have not changed.</span>
                                    @else
                                        @if ($allStatus[$category->slug]->isUp)
                                            <span class="up">are up.</span>
                                        @else
                                            <span class="down">are down.</span>
                                        @endif
                                    @endif
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
                <h3>Track National Grocery Prices</h3>
                <p>
                    Do Eggs Cost More tracks common grocery prices across the
                    United States and compares them to the prices just after the
                    2024 election. Grocery prices, specifically eggs, were a
                    common talking point in the election, so we decided to keep
                    track and prove people right or wrong.
                </p>
                <p>
                    Explore the links above to check prices and history for
                    specific groups of items.
                </p>
            </div>
        </div>
    </div>

    <div class="footer-hero">
        <div class="overlay">
        </div>
    </div>

    <div class="container">
        <div class="row">
            @include('layouts/footer')
        </div>
    </div>
@endsection
