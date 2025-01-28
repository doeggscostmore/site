@extends('layouts/content')

@section('page_title', 'About')

@section('head')
    <link rel="canonical" href="{{ route('about') }}" />
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About</li>
        </ol>
    </nav>
@endsection

@section('page_content')
    <p>
        Do Eggs Cost More is an apolitical site that tracks the prices of common
        grocery items, and compares them to various key dates in the past and
        past US elections.
    </p>
    <p>
        I drew inspiration largely from others who vowed to track grocery prices
        manually after arguments about grocery prices were made during the 2024
        election cycle. Since some of this data is available on free APIs, I
        made use of those and created this cheeky website to summarize what we
        all really want to know: do eggs cost more than they did.
    </p>

    <h2>Contact</h2>
    <p>
        This site is run anonymously. I know what happens when you put an email
        on the internet, and I know what happens when you point out someone is
        wrong.  If you really want to get a hold of me, email <a
        href="mailto:Rice7765@proton.me">Rice7765@proton.me</a>
    </p>

    <h2>Terms / Legal </h2>
    <p>
        Feel free to link to this site, cite it, etc. The data
        is and source code is released under the <a href="https://creativecommons.org/licenses/by-sa/4.0/"
            rel="noopener noreferrer">Attribution-ShareAlike 4.0
            International</a> license. The source code is available
        <a href="https://github.com/doeggscostmore/site" rel="noopener noreferrer">on GitHub.</a>
    </p>
    <p>
        I don't modify the data I get and the calculations are accurate to the
        best of my knowledge, but I'm not a statistician. Please don't form
        policy or make life altering decisions based on the data I present on
        this site. More information about the methods used to collect and
        calculate data are on the <a href="/methodology">Methodology Page</a>.
    </p>
    <p>
        This site is not funded by, endorsed by, or affiliated with any political
        party, politician or political action committee; any NGOs; orange cats;
        or strange men who would describe themselves as chimney enthusiasts.
    </p>

    <h2>Privacy Policy</h2>
    <p>
        Please read our <a href="/privacy">Privacy Policy</a>.
    </p>
@endsection
