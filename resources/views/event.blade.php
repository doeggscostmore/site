@extends('layouts.app')

@section('title')
    {{ ucwords($event->name) }} | Do Eggs Cost More?
@endsection

@section('head')
    <link rel="canonical" href="{{ $canonical }}" />

    <meta property="og:title" content="{{ ucwords($event->name) }} | Do Eggs Cost More?">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $canonical }}">
@endsection

@section('content')
<div class="event-page">
    <div class="heading">
        <div class="container overall">
            <div class="row align-items-center">
                <div class="col col-lg-6">
                    <a href="/" class="back-link"><i class="fa fa-arrow-left"></i>Home</a>
                    @if ($event->type == 'election')
                        <h2>Grocery Prices In The {{ $event->date->year }} Election</h2>
                    @endif
                    @if ($event->type == 'calendar')
                        <h2>Grocery Prices In {{ $event->date->year }}</h2>
                    @endif
                </div>
                <div class="col col-lg-6">
                    <p>
                        Probably a summary about what all the prices did
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-hero" id="hero-img">
    <div class="overlay"></div>
</div>

<div class="container">
    <div class="row">
        @include('partials/footer')
    </div>
</div>
@endsection
