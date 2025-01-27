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
        To use the bot, simply type a comment this message:
        <pre>!doeggscostmore</pre> You can optionally specify one of our product
        categories as well.  If no product category is specified, the price of
        eggs is returned.
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


    <h3>Adding The Bot To A Subreddit You Moderate</h3>
    <p>
        For a number of reasons, we don't reply in subreddits where we haven't
        been given permission.  This is mostly to prevent the impression of spam
        messages or showing up in communities with stricter bot policies.
    </p>
    <p>
        If you are a moderator of a subreddit and would like our bot to reply,
        send a direct message to <a
        href="https://reddit.com/u/DoEggsCostMore">/u/DoEggsCostMore</a> with
        the word "add" and the name of the subreddit you'd like us to respond to
        (ie "add politics"). We'll reply back letting you know the bot has been
        added, and within a few hours we'll start to reply to comments.
    </p>
    <p>
        To remove the bot, send another DM with "remove" then the name of the
        subreddit ("remove politics").  We'll reply back to confirm.  You an
        also just ban our bot user /u/DoEggsCostMore, and we'll no longer reply.
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
