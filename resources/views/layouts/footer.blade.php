<footer>
    <div class="container">
        <div class="row">
            <div class="col">
                &copy; {{ date('Y') }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul role="navigation" class="nav justify-content-center">
                    <li class="nav-item">
                        <a href="/about/">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="/methodology/">Methodology</a>
                    </li>
                </ul>
                <ul role="navigation" class="nav justify-content-center">
                    <li class="nav-item">
                        <a href="/privacy/">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a href="/privacy#opt-out">
                            Do Not Sell My Personal Information
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container seo">
        <div class="row">
            <div class="col">
                <p>
                    Do Eggs Cost More tracks the prices of grocery items over
                    time and compares them to past times and certain political
                    events.
                </p>
            </div>
            <div class="row">
                <div class="col">
                    <ul role="navigation" class="nav justify-content-center">
                        @foreach ($categories as $category)
                        <li class="nav-item">
                            <a href="{{ url("/prices/$category->slug") }}">{{ ucwords($category->name) }} Prices</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>