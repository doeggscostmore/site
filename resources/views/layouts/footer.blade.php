<footer>
    <div class="container">
        <div class="row">
            <div class="col">
                &copy; {{ date('Y') }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a href="/about/">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="/methodology/">Methodology</a>
                    </li>
                    <li class="nav-item">
                        <a href="/privacy/">Privacy</a>
                    </li>
                </ul>
                <ul class="nav justify-content-center">
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
                    Do Eggs Cost More tracks and compares the historic prices of
                    common grocery items, housing, and energy.
                </p>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="nav justify-content-center">
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