@extends('layouts.yjblayout')

@section('title', 'Posts')

@section('content')

    <body>
        <div class="mt-4">
            <div class="flex justify-center">
                @include('components.custom.create-post')
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 justify-items-center mt-4">
                @foreach ($posts as $post)
                    <div
                        class="flex flex-col items-center w-80 h-44 p-6 text-black bg-[#BFC0C0]/30 border-[#BFC0C0]/20 rounded-sm shadow-lg">
                        <h2 class="font-semibold text-xl hover:underline"><a
                                href="{{ route('post.show', ['id' => $post->id]) }}">
                                {{ $post->title }}</a></h2>
                        <div class="mt-2">
                            <p class="text-sm italic">By <a href="{{ route('accounts.show', ['id' => $post->user_id]) }}"
                                    class="hover:underline">&#64{{ $post->user->name }}</a> <br>
                                {{ $post->updated_at->diffForHumans() }}</p>
                        </div>
                        <a class="mt-4 p-2 border-[#4F5D75]/90 bg-[#4F5D75] text-slate-800 rounded-lg backdrop-blur-sm text-md font-bold"
                            href="{{ route('post.show', ['id' => $post->id]) }}"> View</a>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 flex justify-center">
                {{ $posts->links() }}
            </div>
        </div>
    </body>
@endsection
