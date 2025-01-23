@extends('layouts/content')

@section('page_title', 'Updates')

@section('head')
    <link rel="canonical" href="{{ route('updates') }}" />
@endsection

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Updates</li>
        </ol>
    </nav>
@endsection

@section('page_content')
    @forelse ($posts as $post)
        <article>
            <h3>{{ $post->title }}</h3>
            <p>
                {{ $post->summary }}
            </p>
            <a href="{{ route('update-post', $post->slug) }}">Read More</a>
        </article>
    @empty
        <p>No posts right now.</p>
    @endforelse
@endsection
