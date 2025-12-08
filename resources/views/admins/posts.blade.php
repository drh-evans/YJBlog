@extends('layouts.yjblayout')

@section('title', 'All Posts')

@section('content')
    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}"
            class="ml-2 px-2 py-2 border-[#EF8354]/90 bg-[#EF8354] text-slate-800 rounded-lg text-md font-semibold hover:underline hover:bg-[#d58867]">Return</a>
    </div>
    <div class="mt-6 mb-6 flex flex-col items-center">
        <div class="text-center flex flex-col items-center">
            @foreach ($posts as $post)
                <div class="mt-4 w-[700px] border border-black rounded-md bg-[#BFC0C0]/20 shadow-md p-3">
                    <p> <a href="{{ route('post.show', ['id' => $post->id]) }}"
                            class="font-bold text-lg">{{ $post->title }}</a> <br>By <a
                            href="{{ route('account.show', ['id' => $post->user->id]) }}"
                            class="hover:underline text-[#EF8354] text-md">
                            &#64{{ $post->user->name }}
                        </a>
                        on {{ $post->created_at->format('d/m/Y') }}
                    </p>

                    <div class="mt-2 flex justify-center gap-4">
                        @can('delete-post', $post)
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="rounded-lg bg-red-500 hover:bg-red-400 px-3 py-1 font-semibold">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
