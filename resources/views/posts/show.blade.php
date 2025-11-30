@extends('layouts.yjblayout')

@section('title', '')

@section('content')
    <div>
        <a href="{{ route('posts.index') }}">Back</a>
        <div class="flex flex-col items-center">
            <p>
                @if ($post->post_url)
                    <img src="{{ asset('storage/' . $post->post_url) }}" alt="{{ $post->title }}" width="400">
                @endif
            </p>

            <div class="mt-4 text-center">
                <h1 class="font-bold">{{ $post->title }}</h1>
                <p class="text-sm italic">Created by <a href="{{ route('accounts.show', ['id' => $post->user_id]) }}"
                        class="hover:underline">{{ $post->user->name }}</a> on
                    {{ $post->created_at->format('d/m/Y') }} at
                    {{ $post->created_at->format('g:i A T') }}<br> Last updated {{ $post->updated_at->diffForHumans() }}</p>
                <p>{{ $post->body }}</p>
            </div>

            @if ($post->user_id === auth()->id())
                <div class="mt-2 flex justify-center gap-4">
                    <a href="{{ route('post.edit', $post->id) }}"
                        class="rounded-lg bg-gray-500 hover:bg-gray-400 px-3 py-1">
                        Edit
                        Post</a>

                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-lg bg-red-500 hover:bg-red-400 px-3 py-1">Delete Post</button>
                    </form>
                </div>
            @endif

            <div class="text-center">
                <div class="">
                    <h1 class="mt-4 font-bold"> Comments </h1>
                    <p class="font-light italic">Some thoughts from fellow users! If any at all.</p>
                </div>

                @foreach ($comments as $comment)
                    <div class="mt-4">
                        {{ $comment->content }}
                        <p class="italic text-sm">Posted by <a
                                href="{{ route('accounts.show', ['id' => $comment->user_id]) }}"
                                class="hover:underline">{{ $comment->user->name }}</a> on
                            {{ $comment->created_at->format('d/m/Y') }} at
                            {{ $comment->created_at->format('g:i A T') }}<br>
                            Last updated {{ $comment->updated_at->diffForHumans() }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
