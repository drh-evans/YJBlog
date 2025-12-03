@extends('layouts.yjblayout')

@section('title', '')

@section('content')
    <div class="mt-4">
        <a href="{{ route('posts.index') }}"
            class="ml-2 px-2 py-2 border-[#EF8354]/90 bg-[#EF8354] text-slate-800 rounded-lg text-md font-semibold hover:underline hover:bg-[#d58867]">Return</a>
        <div class="flex flex-col items-center">
            <div class="mt-4 w-[700px] border border-black rounded-md bg-[#BFC0C0]/20 shadow-md p-3">

                <div>
                    <h1 class="font-bold text-2xl">{{ $post->title }}</h1>
                    <p class="text-sm italic">By <a href="{{ route('accounts.show', ['id' => $post->user_id]) }}"
                            class="hover:underline text-[#EF8354]">{{ $post->user->name }}</a> at
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

            <div class="mt-2 flex justify-center gap-4">

                @can('edit-post', $post)
                    <a href="{{ route('post.edit', $post->id) }}"
                        class="rounded-lg bg-gray-500 hover:bg-gray-400 px-3 py-1 font-semibold">
                        Edit Post</a>
                @endcan

                @can('delete-post', $post)
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-lg bg-red-500 hover:bg-red-400 px-3 py-1 font-semibold">Delete
                            Post</button>
                    </form>
                @endcan
            </div>

            <div class="text-center">
                <div class="">
                    <h1 class="mt-4 font-bold"> Comments </h1>
                </div>

                @livewire('commenthandler', ['id' => $post->id])
            </div>
        </div>
    </div>
@endsection
