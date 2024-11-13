@extends('layouts.app')

@section('title')
    {{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?
@endsection

@section('head')
    <link rel="canonical" href="{{ $canonical }}" />

    <meta property="og:title" content=" {{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="">

    @if ($data->isUp)
        <meta property="og:description"
            content="Yes, the prices of {{ $category->name }} have gone up {{ round($data->change, 1) }}% since the 2024 Election.">
    @else
        <meta property="og:description"
            content="No, the prices of {{ $category->name }} have gone down {{ round($data->change, 1) }}% since the 2024 Election.">
    @endif
@endsection

@section('content')
    <div class="product home">
        <div class="heading">
            <div class="container overall">
                <div class="row align-items-center">
                    <div class="col">
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
                    <div class="col col-lg-6 item-list">
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

    <div class="container">
        <div class="row">
            @include('layouts/footer')
        </div>
    </div>
@endsection
