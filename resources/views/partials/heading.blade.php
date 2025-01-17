<div class="heading">
    @if ($data->isUp)
    <div class="container overall up">
    @else
    <div class="container overall down">
    @endif
        <div class="row align-items-center">
            <div class="col col-lg-6">
                <a href="/" class="back-link"><i class="fa fa-arrow-left"></i>Home</a>
                <h1>{{ ucwords($category->verb) }} {{ ucwords($category->name) }} Cost More?</h1>
                @if ($data->isUp)
                    <h2>Yes.</h2>
                    <span class="tagline">
                        The prices of {{ $category->name }} have gone up <b>{{
                        abs(round($data->change, 1)) }}%</b> since {{ $data->start->format('F, Y') }}.
                    </span>
                @else
                    <h2>No.</h2>
                    <span class="tagline">
                        The prices of {{ $category->name }} have gone down <b>{{
                        abs(round($data->change, 1)) }}%</b> since {{ $data->start->format('F, Y') }}
                    </span>
                @endif
                
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