@extends('layouts.yjblayout')

@section('title', 'Posts')

@section('content')
    <body>
        <div>
            <a href="{{ route('posts.create') }}">New Post</a>

            @foreach ($posts as $post)
                <div class="mt-4 flex flex-col items-center bg-blue-900 rounded-lg p-2 w-64 mx-auto">
                    <h2 class="text-red-500 hover:underline"><a href="{{ route('post.show', ['id' => $post->id]) }}">
                                {{ $post->title }}</a></h2>
                    <div>
                        <button>Comment</button>
                        <button>Like</button>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
@endsection
