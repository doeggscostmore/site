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
                <div class="col">
                    <a href="/" class="back-link"><i class="fa fa-arrow-left"></i>Home</a>
                    @if ($event->type == 'election')
                        <h2>Grocery Prices Before The {{ $event->date->year }} Election</h2>
                    @endif
                    @if ($event->type == 'calendar')
                        <h2>Grocery Prices In {{ $event->date->year }}</h2>
                    @endif
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    @if ($event->type == 'election')
                        <span class="tagline">
                            In the {{ $event->length }} months before the  {{
                            $event->date->year }} election, prices for {{
                            $upCount }} types of goods and services rose.
                        </span>
                    @endif
                    @if ($event->type == 'calendar')
                    <span class="tagline">
                        In {{ $event->date->year }}, prices for {{ $upCount }}
                        types of goods and services rose.
                    </span>
                    @endif
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-sm-12 item-list">
                    <div class="row">
                        @foreach ($summaries as $summary)
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

                                {{ ucwords($summary->product->name) }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="chart section">
            <div class="container">
                <div class="row mt-5">
                    <div class="col text-center">
                        <h3 id="past-data">Past Data</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <canvas id="eventprices"></canvas>

                        <script type="text/javascript">
                            const prices = {{ Illuminate\Support\Js::from($trends) }};
                        </script>
                    </div>
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
