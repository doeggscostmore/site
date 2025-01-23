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
        Look at the documentation for your platform to how to block or remove
        our bot.  In some cases, like Discord, the bot has to be installed
        manually (we didn't just add it).
    </p>

    <h3>Does the bot collect any information bout me?</h3>
    <p>
        No, our bot only count the number of times its summoned in each channel.
        For example, we'll log that the bot was summoned on Reddit, but nothing
        more.
    </p>
    <p>
        If you visit our site, we'll use our <a href="{{ route('privacy')
        }}">Privacy Policy</a>
    </p>
@endsection
