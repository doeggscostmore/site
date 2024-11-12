@extends('layouts.app')

@section('title')
    {{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?
@endsection

@section('content')
    <div class="product @if ($isHome) home @endif">
        <div class="heading">
            @if ($data->isUp)
            <div class="container overall up">
            @else
            <div class="container overall down">
            @endif
                <div class="row align-items-center">
                    <div class="col col-lg-6">
                        <h1>{{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?</h1>
                        @if ($data->isUp)
                            <h2>Yes<span id="insult"></span></h2>
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
                        <span class="current">
                            The current average price of all our sampled
                            products is <b>${{ round($data->currentPrice, 2) }}</b>.
                        </span>
                    </div>
                    <div class="col col-lg-6 d-none d-lg-block">
                        @if ($data->isUp)
                        <img id="picture-bad" alt="" />
                        @else
                        <img id="picture-good" alt="" />
                        @endif
                    </div>
                </div>
            </div>
        </div>

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
                                <span class="up">${{ round($event->price, 2) }}</span>
                                <span class="small">Up {{ round($event->change, 2) }}%</span>
                            @else
                                <span class="down">${{ round($event->price, 2) }}</span>
                                <span class="small">Down {{ round($event->change, 2) }}%</span>

                            @endif
                        </div>
                        @else
                        <div class="col-md-3 event-change">
                            <span class="baseline">${{ round($event->price, 2) }}</span>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
