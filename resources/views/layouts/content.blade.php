@extends('layouts.app')

@section('title')
    @yield('page_title') | Do Eggs Cost More?
@endsection

@section('content')
    <div class="page">
        <div class="hero" id="hero-img">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <h1>@yield('page_title')</h1>
                    </div>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
        <div class="container">
            @yield('breadcrumbs')
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    @yield('page_content')
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @include('partials/footer')
            </div>
        </div>
    </div>
@endsection
