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
        change in price for a product category.  This bot must be added to a
        subreddit by a moderator, and will only reply when summoned.
    </p>

    <h3>Usage</h3>
    <p>
        To use the bot, mention our bot user in a comment and we'll reply, some
        examples are below.  We'll reply with the prices for the last 6 months
        for the product category you requested, or eggs if you didn't request
        any specific category.
    </p>
    <p>
        The bot will link to the relevant page on our site, but the comment won't be updated should the prices change in the future.
    </p>
    <p>
        <pre>u/doeggcostmore energy</pre><br />
        <pre>u/doeggscostmore</pre>
    </p>
    <p>
        These are our currently supported categories:
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

    <h3>Privacy</h3>
    <p>
        When you summon our bot, we only collect the comment ID where we were
        summoned.  We don't collect information about users in the thread, the
        post itself, or the user that sent the request.
    </p>

    <hr />

    <p>
        For more information about our bots, please see our <a href="{{
        route('bot') }}">Bot Information Page</a>
    </p>
   
@endsection
