@extends('layouts/content')

@section('page_title', 'Bot Information')

@section('head')
    <link rel="canonical" href="{{ route('bot') }}" />
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('about') }}">About</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bot Info</li>
        </ol>
    </nav>
@endsection

@section('page_content')
    <p>
        You're landing on this page because you're following links from one of
        our bots.  Here's some information about our bots.
    </p>

    <h3>Why did the bot reply?</h3>
    <p>
        Our bot only replies when summoned.  Summoning the bot looks different
        for different platforms, check the documentation for the platform you're
        on for how to summon the bot.
    </p>
    
    <h3>I'm a mod and I don't want your bot around.</h3>
    <p>
        In all cases, the bot needs to be added to your community or server
        before it will respond.  You can remove the bot, or just ban it to keep
        it from replying again.
    </p>

    <h3>Does the bot collect any information bout me?</h3>
    <p>
        No.  Our bot will only collect information about where it was summoned.
        It doesn't collect any information about the thread, who summoned it, or
        other details about other conversations.
    </p>
    <p>
        If you follow the link to visit our site, we'll use our <a href="{{
        route('privacy') }}">Privacy Policy</a>
    </p>

    <h3>Supported Bots</h3>
    <p>
        Right now, we just have a <a href="{{ route('update-post',
        'introducing-our-reddit-bot') }}">Reddit Bot</a>, but we're working on
        adding bots for other platforms.
    </p>
@endsection
