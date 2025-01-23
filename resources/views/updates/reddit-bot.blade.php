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
        Content goes here
    </p>
@endsection
