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
        @include('partials/heading')
        @include('partials/share')

        <div class="chart">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h3>Price History</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <canvas id="prices"></canvas>

                        <script type="text/javascript">
                            const prices = {{ Illuminate\Support\Js::from($rawData) }};
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="events">
            <div class="container">
                <div class="row mt-5">
                    <div class="col text-center">
                        <h4>Past Elections</h4>
                    </div>
                </div>
                @forelse ($events->where('type', '=', 'election') as $event)
                    @if (is_null($event->summary->end))
                        @continue
                    @endif
                    <div class="row event align-items-center">
                        <div class="col-md-4 event-name">
                            <a href="{{ url("events/{$event->slug}") }}/">
                                {{ $event->name }}
                            </a>
                        </div>
                        <div class="col-md-4 event-change d-flex flex-row justify-content-center align-items-center">
                            @if ($event->summary->isUp)
                            <span class="up" data-toggle="tooltip" title="In the {{ $event->length }} months before this election, prices rose {{ abs(round($event->summary->change, 2)) }}%.">
                                <i class="fa fa-up-long"></i>
                                <span class="sr-only">Up</span>
                                <span>
                                    {{ abs(round($event->summary->change, 2)) }}%
                                </span>
                            </span>
                            @else
                            <span class="down" data-toggle="tooltip" title="In the {{ $event->length }} months before this election, prices fell {{ abs(round($event->summary->change, 2)) }}%.">
                                <i class="fa fa-down-long"></i>
                                <span class="sr-only">Down</span>
                                <span>
                                    {{ abs(round($event->summary->change, 2)) }}%
                                </span>                            
                            </span>
                            @endif
                            <span class="small">in {{ $event->length }} months</span>
                        </div>
                        <div class="col-md-4 event-change d-flex flex-row justify-content-center align-items-center">
                            @php
                                if ($event->summary->end_price && $data->end_price) {
                                    $eventChange = (($data->end_price - $event->summary->end_price) / $event->summary->end_price) * 100;
                                } else {
                                    $eventChange = 0;
                                }
                            @endphp
                            @if ($eventChange > 0)
                            <span class="up" data-toggle="tooltip" title="Prices now are {{ abs(round($eventChange, 2)) }}% higher than they were at that time.">
                                <i class="fa fa-up-long"></i>
                                <span class="sr-only">Up</span>
                                <span>
                                    {{ abs(round($eventChange, 2)) }}%
                                </span>
                            </span>
                            @else
                            <span class="down" data-toggle="tooltip" title="Prices now are {{ abs(round($eventChange, 2)) }}% lower than they were at that time.">
                                <i class="fa fa-down-long"></i>
                                <span class="sr-only">Down</span>
                                <span>
                                    {{ abs(round($eventChange, 2)) }}%
                                </span>
                            </span>
                            @endif
                            <span class="small">vs now</span>
                        </div>
                    </div>
                @empty
                    <div class="row event none">
                        <div class="col">
                            <p>
                                Soon you'll be able to see the changes at times in the past.
                            </p>
                        </div>
                    </div>
                @endforelse

                <div class="row mt-5">
                    <div class="col text-center">
                        <h4>Past Years</h4>
                    </div>
                </div>
                @forelse ($events->where('type', '=', 'calendar') as $event)
                    @if (is_null($event->summary->end))
                        @continue
                    @endif
                    <div class="row event align-items-center">
                        <div class="col-md-4 event-name">
                            <a href="{{ url("events/{$event->slug}") }}/">
                                {{ $event->name }}
                            </a>
                        </div>
                        <div class="col-md-4 event-change d-flex flex-row justify-content-center align-items-center">
                            @if ($event->summary->isUp)
                            <span class="up" data-toggle="tooltip" title="In this year, prices rose {{ abs(round($event->summary->change, 2)) }}%.">
                                <i class="fa fa-up-long"></i>
                                <span class="sr-only">Up</span>
                                <span>
                                    {{ abs(round($event->summary->change, 2)) }}%
                                </span>
                            </span>
                            @else
                            <span class="down" data-toggle="tooltip" title="In this year, prices fell {{ abs(round($event->summary->change, 2)) }}%.">
                                <i class="fa fa-down-long"></i>
                                <span class="sr-only">Down</span>
                                <span>
                                    {{ abs(round($event->summary->change, 2)) }}%
                                </span>                            
                            </span>
                            @endif
                            <span class="small">in {{ $event->length }} months</span>
                        </div>
                        <div class="col-md-4 event-change d-flex flex-row justify-content-center align-items-center">
                            @php
                                if ($event->summary->end_price && $data->end_price) {
                                    $eventChange = (($data->end_price - $event->summary->end_price) / $event->summary->end_price) * 100;
                                } else {
                                    $eventChange = 0;
                                }
                            @endphp
                            @if ($eventChange > 0)
                            <span class="up" data-toggle="tooltip" title="Prices now are {{ abs(round($eventChange, 2)) }}% higher than they were at the end of this year.">
                                <i class="fa fa-up-long"></i>
                                <span class="sr-only">Up</span>
                                <span>
                                    {{ abs(round($eventChange, 2)) }}%
                                </span>
                            </span>
                            @else
                            <span class="down" data-toggle="tooltip" title="Prices now are {{ abs(round($eventChange, 2)) }}% lower than they were at the end of this year.">
                                <i class="fa fa-down-long"></i>
                                <span class="sr-only">Down</span>
                                <span>
                                    {{ abs(round($eventChange, 2)) }}%
                                </span>
                            </span>
                            @endif
                            <span class="small">vs now</span>
                        </div>
                    </div>
                @empty
                    <div class="row event none">
                        <div class="col">
                            <p>
                                Soon you'll be able to see the changes at times in the past.
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
            @include('partials/footer')
        </div>
    </div>
@endsection
