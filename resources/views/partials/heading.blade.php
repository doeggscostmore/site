<div class="heading">
    @if ($data->isUp)
        <div class="container overall up">
        @else
            <div class="container overall down">
    @endif
    <div class="row align-items-center">
        <div class="col-12 col-lg-6">
            <a href="/" class="back-link"><i class="fa fa-arrow-left"></i>Home</a>
            <h1>{{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?</h1>
            @if ($data->isUp)
                <h2>Yes.</h2>
            @else
                <h2>No.</h2>
            @endif
        </div>
        <div class="col-12 col-lg-6">
            @if ($data->isUp)
                <span class="tagline">
                    The prices of {{ $category->name }} have gone up <b>{{ abs(round($data->change, 1)) }}%</b> since
                    {{ $data->start->format('F, Y') }}.
                </span>
            @else
                <span class="tagline">
                    The prices of {{ $category->name }} have gone down <b>{{ abs(round($data->change, 1)) }}%</b> since
                    {{ $data->start->format('F, Y') }}
                </span>
            @endif
            @if ($weekSummary)
                @if ($weekSummary->change == 0)
                    <span class="week-tagline">
                        In the past {{ round($weekSummary->start->diffInDays($weekSummary->end)) }} days, the
                        average price of our sampled goods has remained the same.
                    </span>
                @else
                    @if ($weekSummary->isUp)
                        <span class="week-tagline">
                            In the past {{ round($weekSummary->start->diffInDays($weekSummary->end)) }} days, the
                            average price of our sampled goods has gone
                            up <b>{{ number_format(abs($weekSummary->change), 1) }}%</b>.
                        </span>
                    @else
                        <span class="week-tagline">
                            In the past {{ round($weekSummary->start->diffInDays($weekSummary->end)) }} days, the
                            average price of our sampled goods has gone
                            down <b>{{ number_format(abs($weekSummary->change), 1) }}%</b>.
                        </span>
                    @endif
                @endif
            @endif
        </div>
        <div class="col-12 text-center">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#past-data">Past Data</a>
                </li>
                <li class="nav-item">
                    <a href="#past-elections" class="nav-link">Past Elections</a>
                </li>
                <li class="nav-item">
                    <a href="#past-years" class="nav-link">Past Years</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link">About</a>
                </li>
            </ul>
        </div>
    </div>
</div>
