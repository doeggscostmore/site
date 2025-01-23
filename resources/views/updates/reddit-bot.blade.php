@extends('layouts/content')

@section('page_title', 'Introducing Our Reddit Bot')

@section('head')
    <link rel="canonical" href="{{ route('update-post', 'introducing-our-reddit-bot') }}" />
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('updates') }}">Updates</a></li>
            <li class="breadcrumb-item active" aria-current="page">Introducing Our Reddit Bot</li>
        </ol>
    </nav>
@endsection

@section('page_content')
    <p>
        We're happy to announce a new way to share stats quickly on Reddit!
        Using our bot, you can quickly leave a comment that shares the current
        change in price for a product category.  This bot won't reply
        automatically without being summoned, and can be blocked from your
        subreddit if you're a moderator and prefer it not to be around.
    </p>
    <h3>Usage</h3>
    <p>
        To use the bot, simply type a comment with the `/doeggscostmore`.  You
        can optionally specify one of our product categories as well.  If no
        product category is specified, the price of eggs is returned.
    </p>
    <ul class="three-col">
        @foreach ($categories as $category)
            <li><pre>{{ $category->slug }}</pre></li>
        @endforeach
    </ul>
    <p>
        We'll return the price change at that time for the last 6 months.  The
        comment won't be updated should the price change in the future and will
        contain a link to our product page.
    </p>
@endsection
