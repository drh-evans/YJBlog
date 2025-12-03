@extends('layouts.yjblayout')

@section('title', 'Posts')

@section('content')

    <body>
        <div>
            <a href="{{ route('posts.create') }}">New Post</a>

            <div class="grid grid-cols-3">
                @foreach ($posts as $post)
                    <div class="mt-4 text-white bg-blue-900 rounded-lg px-10 py-10 w-64 mx-auto">
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

                <div class="mt-4 flex justify-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </body>
@endsection
