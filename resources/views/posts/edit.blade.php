@extends('layouts.yjblayout')

@section('title', 'Edit your post!')

@section('content')

    <div class="mt-4 flex flex-col items-center">

        @include('components.custom.error')

        <form method='POST' action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <input type="text" name="title" placeholder="Add a comment..." value="{{ old('title', $post->title) }}"
                class=" text-black bg-slate-300 rounded-lg w-full mb-2">
            <textarea name="body" placeholder="What are you thinking?"
                class="mt-2 text-black bg-slate-300 rounded-lg w-full mb-2">{{ old('body', $post->body) }}</textarea>
            <input type="file" name="image" class="mt-2">

            <div class="mt-2 flex justify-center gap-4">
                <button type="submit" class="rounded-lg bg-green-500 hover:bg-green-400 px-4 py-2"> Save Post</button>
                <a href="{{ route('posts.index') }}" class="rounded-lg bg-gray-500 hover:bg-gray-400 px-4 py-2"> Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
