@extends('layouts.yjblayout')

@section('title', 'All Comments')

@section('content')
    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}"
            class="ml-2 px-2 py-2 border-[#EF8354]/90 bg-[#EF8354] text-slate-800 rounded-lg text-md font-semibold hover:underline hover:bg-[#d58867]">Return</a>
    </div>
    <div class="mt-6 mb-6 flex flex-col items-center">
        <div class="text-center flex flex-col items-center">
            @foreach ($comments as $comment)
                <div class="mt-4 w-[700px] border border-black rounded-md bg-[#BFC0C0]/20 shadow-md p-3">
                    <p> <a href="{{ route('comment.show', ['id' => $comment->id]) }}"
                            class="font-bold text-lg">{{ $comment->content }}</a> <br>By <a
                            href="{{ route('account.show', ['id' => $comment->user->id]) }}"
                            class="hover:underline text-[#EF8354] text-md">
                            &#64{{ $comment->user->name }}
                        </a>
                        on {{ $comment->created_at->format('d/m/Y') }}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $comments->links() }}
        </div>
    @endsection
