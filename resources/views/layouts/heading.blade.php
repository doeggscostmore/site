<div class="heading">
    @if ($data->isUp)
    <div class="container overall up">
    @else
    <div class="container overall down">
    @endif
        <div class="row align-items-center">
            <div class="col col-lg-6">
                <a href="/" class="back-link"><i class="fa fa-arrow-left"></i>Other Products</a>
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
                        gone up <b>{{ abs(round($data->change, 1)) }}%</b> since the
                        2024 Election.
                    </span>
                @else
                    <h2>No.</h2>
                    <span class="tagline">
                        The prices of {{ $category->name }} have
                        gone down <b>{{ abs(round($data->change, 1)) }}%</b> since
                        the 2024 Election.
                    </span>
                @endif
                @endif
                <span class="current">
                    The current average price of all our sampled
                    products is <b>${{ number_format($data->end_price, 2) }}</b>.
                </span>
            </div>
            <div class="col col-lg-6 d-none d-lg-block">
                @if ($data->isUp)
                <img id="picture-bad" alt="an ai-generated image of unhappy food" />
                @else
                <img id="picture-good" alt="an ai-generated image of happy food" />
                @endif
            </div>
        </div>
    </div>
</div>