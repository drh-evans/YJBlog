@extends('layouts.yjblayout')

@section('title', '')

@section('content')
    <div>
        <a href="{{ route('accounts.index') }}">Back</a>


        <div class="text-center">
            <h1 class="font-bold">{{ $account->display_name }}'s Profile</h1>
            <p class="italic">
                {{ $account->description }} <br>
                Total posts made: {{ $posts->count() }}
                Total comments made: {{ $comments->count() }}
            </p>
        </div>

        <div>
            <h1>{{ $account->display_name }}'s Posts</h1>
            @foreach ($posts as $post)
                <a href="{{ route('post.show', $post->id) }}">{{ $post->title }} <br></a>
            @endforeach

            <h1>{{ $account->display_name }}'s Comments</h1>
            @foreach ($comments as $comment)
                <a href="{{ route('post.show', $comment->post_id) }}">{{ $comment->content }} <br></a>
            @endforeach
        </div>
    </div>
@endsection
