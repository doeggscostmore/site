@extends('layouts.app')

@section('title')
    {{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?
@endsection

@section('head')
    <link rel="canonical" href="{{ $canonical }}/" />

    <meta property="og:title" content=" {{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $canonical }}">

    @if ($data->isUp)
        <meta property="og:description"
            content="Yes, the prices of {{ $category->name }} have gone up {{ round($data->change, 1) }}% since the 2024 Election." />
        <meta name="description"
            content="Yes, the prices of {{ $category->name }} have gone up {{ round($data->change, 1) }}% since the 2024 Election." />

    @else
        <meta property="og:description"
            content="No, the prices of {{ $category->name }} have gone down {{ round($data->change, 1) }}% since the 2024 Election." />
        <meta name="description"
            content="No, the prices of {{ $category->name }} have gone down {{ round($data->change, 1) }}% since the 2024 Election." />

    @endif
@endsection

@section('content')
    <div class="product">
        @include('layouts/heading')
        @include('layouts/share')

        <div class="events">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>Price History</h3>
                    </div>
                </div>
                @foreach ($data->events as $event)
                    <div class="row event">
                        <div class="col-md-6 event-name">
                            {{ $event->name }}
                        </div>
                        <div class="col-md-3 event-date">
                            {{ $event->date->format('F d, Y') }}
                            @if ($event->name == '2024 Presidential Election')
                                <span class="small">This is the earliest data.</span>
                            @endif
                        </div>
                        @if ($event->name != '2024 Presidential Election')
                            <div class="col-md-3 event-change">
                                @if ($event->isUp)
                                    <span class="up">${{ number_format($event->price, 2) }}</span>
                                    <span class="small">Up {{ round($event->change, 2) }}%</span>
                                @else
                                    <span class="down">${{ number_format($event->price, 2) }}</span>
                                    <span class="small">Down {{ round($event->change, 2) }}%</span>
                                @endif
                            </div>
                        @else
                            <div class="col-md-3 event-change">
                                <span class="baseline">${{ number_format($event->price, 2) }}</span>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="footer-hero" id="hero-img">
        <div class="overlay"></div>
    </div>

    <div class="container">
        <div class="row">
            @include('layouts/footer')
        </div>
    </div>
@endsection
