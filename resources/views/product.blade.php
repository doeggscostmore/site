@extends('layouts.app')

@section('title')
    {{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?
@endsection

@section('head')
    <link rel="canonical" href="{{ $canonical }}" />

    <meta property="og:title" content=" {{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $canonical }}">

    @if ($data->isUp)
        <meta property="og:description"
            content="Yes, the prices of {{ $category->name }} have gone up {{ abs(round($data->change, 1)) }}% since the 2024 Election." />
        <meta name="description"
            content="Yes, the prices of {{ $category->name }} have gone up {{ abs(round($data->change, 1)) }}% since the 2024 Election." />
    @else
        <meta property="og:description"
            content="No, the prices of {{ $category->name }} have gone down {{ abs(round($data->change, 1)) }}% since the 2024 Election." />
        <meta name="description"
            content="No, the prices of {{ $category->name }} have gone down {{ abs(round($data->change, 1)) }}% since the 2024 Election." />
    @endif
@endsection

@section('content')
    <div class="product">
        @include('layouts/heading')
        @include('layouts/share')

        <div class="events">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h3>Price History</h3>
                    </div>
                </div>
                @forelse ($events as $event)
                    @php
                        $summary = $summaries->firstWhere('end', $event->date)
                    @endphp
                    @dump($summaries)

                    <div class="row event">
                        <div class="col-md-6 event-name">
                            {{ $event->description }}
                        </div>
                        <div class="col-md-3 event-date">
                            @php
                                // $date = new Carbon\Carbon($summary->start)
                            @endphp
                            {{-- {{ $date->format('F d, Y') }} --}}
                            @if ($event->description == '2024 Presidential Election')
                                <span class="small">This is the earliest data.</span>
                            @endif
                        </div>
                        @if ($event->description != '2024 Presidential Election')
                            <div class="col-md-3 event-change">
                                @if ($event->isUp)
                                    <span class="up">${{ number_format($event->price, 2) }}</span>
                                    <span class="small">Up {{ abs(round($event->change, 2)) }}%</span>
                                @else
                                    <span class="down">${{ number_format($event->price, 2) }}</span>
                                    <span class="small">Down {{ abs(round($event->change, 2)) }}%</span>
                                @endif
                            </div>
                        @else
                            <div class="col-md-3 event-change">
                                <span class="baseline">${{ number_format($event->price, 2) }}</span>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="row event none">
                        <div class="col">
                            <p>
                                Once key events after the 2024 election take place, we'll show the changes on those dates.
                            </p>
                        </div>
                    </div>
                @endforelse
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
