@extends('layouts.yjblayout')

@section('title', '')

@section('content')
    <div>
        <a href="{{ route('posts.index') }}">Back</a>
        <div style="display: grid; place-items: center;">
            <h1>{{ $post->title }} <br> Created by {{ $username[0] }} on {{ $post->created_at->format('d/m/Y') }} at 
                {{ $post->created_at->format('g:i A T') }}<br>
                Last updated {{ $post->updated_at->diffForHumans() }}
            </h1>
            <p>{{ $post->body }}</p>
            <p>
                @if ($post->post_url)
                    <img src="{{ asset('storage/' . $post->post_url) }}" alt="{{ $post->title }}" width="400">
                @endif
            </p>

            <a href="{{ route('post.edit', $post->id) }}"> Edit Post</a>
        </div>
    </div>
@endsection