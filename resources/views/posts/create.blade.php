@extends('layouts.yjblayout')

@section('title', 'Create a post')

@section('content')

    <div class="mt-4 flex flex-col items-center">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <p class="mt-2 font-bold">Your title:</p>
            <input type="text" name="title" value="{{ old('title') }}"
                class=" text-black bg-slate-300 rounded-lg w-full mb-2">
            <p class="mt-2 font-bold">Your content:</p>
            <textarea name="body" class="mt-2 text-black bg-slate-300 rounded-lg w-full mb-2">{{ old('body') }}</textarea>
            <p class="mt-2 font-bold">Any images?</p>
            <input type="file" class="mt-2" name="image">

            <div class="mt-4 flex justify-center gap-4 font-bold">
                <button type="submit" class="rounded-lg bg-green-500 hover:bg-green-400 px-4 py-2"> Submit Post</button>
                <button href="{{ route('posts.index') }}" class="rounded-lg bg-gray-500 hover:bg-gray-400 px-4 py-2"> Cancel
                </button>
            </div>
        </form>
    </div>
@endsection
