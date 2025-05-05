@extends('layouts/content')

@section('page_title', 'May 2025 Updates')

@section('head')
    <link rel="canonical" href="{{ route('update-post', 'may-2025-updates') }}" />
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('updates') }}">Updates</a></li>
            <li class="breadcrumb-item active" aria-current="page">May 2025 Updates</li>
        </ol>
    </nav>
@endsection

@section('page_content')
    <p>
        We've made some updates to our site regarding how some data is
        displayed.  For the short term prices changes, we've updated the time to
        be 14 days rather than 7 days, as the EIA data sets are only updated
        every 7 days.
    </p>

    <p>
        We're also no longer showing the average price, but the percent change
        like we do for the longer term data.  This is to make things more
        uniform and keep the data compared in the same format.
    </p>

    <p>
        We've also updated our Reddit bot to no longer need enabled on specific
        subreddits.  Moderates can still block our bot from posting, but with
        Reddit's upcoming removal of direct messages and their API support for
        chat messages lacking, we feel this is a good way forward for now at
        least.
    </p>

    <p>
        And yes, eggs still cost more.
    </p>
   
@endsection
