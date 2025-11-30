@extends('layouts.yjblayout')

@section('title', $account->display_name . "'s Profile")

@section('content')
    <div>
        <a href="{{ route('accounts.index') }}">Back</a>

        <div>
            <h1>{{ $account->display_name }}'s Posts</h1>
            @foreach ($posts as $post)
                <a href="{{ route('post.show', $post->id) }}">{{ $post->title }} <br></a>
            @endforeach
        </div>
    </div>
@endsection
