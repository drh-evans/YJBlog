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
                        Total comments made: {{ $totalComments }} <br>
                        Total posts made: {{ $totalPosts }}
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-4 mb-4 flex flex-col items-center">
            <table
                class="border-separate border-spacing-3 border border-black rounded-md bg-[#BFC0C0]/20 shadow-md p-3 text-center">
                <thead>
                    <tr>
                        <th>Posts</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td> <a href="{{ route('post.show', $post->id) }}"
                                    class="text-md hover:underline hover:text-[#EF8354]">{{ $post->title }}</a>
                            </td>

                            @can('delete-post', $post)
                                <td>
                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="rounded-lg bg-red-500 hover:bg-red-400 p-2  text-sm font-semibold">Delete</button>
                                    </form>
                                </td>
                            @endcan

                            @can('edit-post', $post)
                                <td>
                                    <a href="{{ route('post.edit', $post->id) }}"
                                        class="rounded-lg bg-gray-500 hover:bg-gray-400 p-2 text-sm font-semibold">
                                        Edit</a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table
                class="mt-4 mb-4 border-separate border-spacing-3 border border-black rounded-md bg-[#BFC0C0]/20 shadow-md p-3 text-center">
                <thead>
                    <tr>
                        <th>Comments</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td> <a href="{{ route('comment.show', $comment->id) }}"
                                    class="text-md hover:underline hover:text-[#EF8354]">{{ $comment->content }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $comments->links() }}
        </div>
    </div>
@endsection
