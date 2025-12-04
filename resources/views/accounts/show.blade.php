@extends('layouts.yjblayout')

@section('title', '')

@section('content')
    <div class="mt-4 ml-2">
        <a href="{{ route('accounts.index') }}"
            class="ml-2 px-2 py-2 border-[#EF8354]/90 bg-[#EF8354] text-slate-800 rounded-lg text-md font-semibold hover:underline hover:bg-[#d58867]">Return</a>

        <div class="flex flex-col items-center">
            <div class="mt-4 w-[700px] border border-black rounded-md bg-[#BFC0C0]/20 shadow-md p-3 text-center">
                <h1 class="font-bold text-xl">{{ $account->display_name }}'s Profile</h1>
                <p class="text-[#EF8354] italic text-med">&#64{{ $account->user->name }}</p>
                <p class="text-sm font-semibold">Supports: {{ $club->name }}</p>
                <div class="mt-2">
                    <p class="italic">
                        {{ $account->description }} <br>
                        Total comments made: {{ $comments->count() }} <br>
                        Total posts made: {{ $posts->count() }}
                    </p>
                </div>
            </div>
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
