@extends('layouts.yjblayout')

@section('title', '')

@section('content')
    <div class="mt-4">
        <a href="{{ route('account.show', ['id' => $comment->user_id]) }}"
            class="ml-2 px-2 py-2 border-[#EF8354]/90 bg-[#EF8354] text-slate-800 rounded-lg text-md font-semibold hover:underline hover:bg-[#d58867]">Return</a>
        <div class="flex flex-col items-center">
            <div class="mt-4 w-[700px] border border-black rounded-md bg-[#BFC0C0]/20 shadow-md p-3">
                <div>
                    <div class="flex flex-row items-center justify-between">
                        <h1 class="font-bold text-2xl">{{ $post->title }}</h1>

                        <div class="mr-4">
                            @livewire('like-counter', ['likeableType' => 'post', 'likeableId' => $post->id])
                        </div>
                    </div>
                    <p class="text-sm italic">By <a href="{{ route('account.show', ['id' => $post->user_id]) }}"
                            class="hover:underline text-[#EF8354]">&#64{{ $post->user->name }}</a> at
                        {{ $post->created_at->format('g:i A T') }} on
                        {{ $post->created_at->format('d/m/Y') }}<br> Updated {{ $post->updated_at->diffForHumans() }}
                    </p>
                    <p class="text-base mt-2">{{ $post->body }}</p>

                    <p>
                        @if ($post->post_url)
                            <img src="{{ asset('storage/' . $post->post_url) }}" alt="{{ $post->title }}"
                                class="mt-2 rounded-lg shadow-sm">
                        @endif
                    </p>
                </div>
            </div>

            <div class="mt-4 w-[700px] border border-black rounded-md bg-[#BFC0C0]/20 shadow-md p-3">
                <p class="text-md">{{ $comment->content }}</p>
                <p class="italic text-sm mt-2"><a href="{{ route('account.show', ['id' => $comment->user_id]) }}"
                        class="hover:underline text-[#EF8354]">&#64{{ $comment->user->name }}</a>
                    Commented {{ $comment->updated_at->diffForHumans() }} ({{ $comment->created_at->format('d/m/Y') }})

                    @livewire('like-counter', ['likeableType' => 'comment', 'likeableId' => $comment->id], key('like-count-' . $comment->id))
                </p>
            </div>
        </div>
    </div>

@endsection
