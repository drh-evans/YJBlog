@extends('layouts.yjblayout')

@section('title', 'Posts')

@section('content')

    <body>
        <div>
            <a href="{{ route('posts.create') }}">New Post</a>

            <div class="grid grid-cols-3 gap-2">
                @foreach ($posts as $post)
                    <div class="mt-4 text-white bg-[#4F5D75] rounded-lg px-4 py-4">
                        <h2 class="font-semibold text-center hover:underline"><a
                                href="{{ route('post.show', ['id' => $post->id]) }}">
                                {{ $post->title }}</a></h2>
                        <div class="mt-2">
                            <p class="text-sm italic text-center">Created by <a
                                    href="{{ route('accounts.show', ['id' => $post->user_id]) }}"
                                    class="hover:underline">{{ $post->user->name }}</a> <br> Created on
                                {{ $post->created_at->format('d/m/Y') }} <br> Updated
                                {{ $post->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4 flex justify-center">
                {{ $posts->links() }}
            </div>
        </div>
    </body>
@endsection
