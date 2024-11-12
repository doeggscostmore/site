@extends('layouts.app')

@section('title')
{{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?
@endsection

@section('content')
    <div class="product">
        <div class="heading">
            <div class="container overall">
                <div class="row">
                    <div class="col text-center">
                        @if ($data->isUp)
                            <h1>Yes.</h1>
                            <span class="tagline">
                                The prices of {{ ucwords($category->name) }} has
                                gone up <b>{{ round($data->change, 1) }}%</b> since the
                                2024 Election.
                            </span>
                        @else
                            <h1>No.</h1>
                            <span class="tagline">
                                The prices of {{ ucwords($category->name) }} has
                                gone down <b>{{ round($data->change, 1) }}%</b> since
                                the 2024 Election.
                            </span>
                        @endif
                        <span class="current">
                            The current average price of all our sampled
                            products is <b>${{ round($data->currentPrice, 2) }}</b>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="events">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>Prices at Key Events</h3>
                    </div>
                </div>
                @foreach ($data->events as $event)
                    <div class="row">
                        <div class="col-md-3 event-date">
                            {{ $event->date->format('F d, Y') }}
                        </div>
                        <div class="col-md-6 event-name">
                            {{ $event->name }}
                        </div>
                        @if ($event->name != '2024 Presidential Election')
                        <div class="col-md-3 event-change">
                            @if ($event->isUp)
                                <span class="up">${{ round($event->price, 2) }} (Up {{ round($event->change, 2) }}%)</span>
                            @else
                                <span class="down">${{ round($event->price, 2) }} (Down {{ round($event->change, 2) }}%)</span> 
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
