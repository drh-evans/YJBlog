@extends('layouts.yjblayout')

@section('title', 'Edit your post!')

@section('content')
    @if ($errors->any())
        <div>
            <ul style="color: red">
                @foreach ($errors->all() as $error)
                    <li><strong>ERROR! </strong>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mt-4 flex flex-col items-center">
        <form method='POST' action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class=" text-black bg-slate-300 rounded-lg w-full mb-2">
            <textarea name="body" class="mt-2 text-black bg-slate-300 rounded-lg w-full mb-2">{{ old('body', $post->body) }}</textarea>
            <input type="file" name="image" class="mt-2">

            <div class="mt-2 flex justify-center gap-4">
                <input type="submit" value="Save" class="rounded-lg bg-green-500 hover:bg-green-400 px-4 py-2">
                <a href="{{ route('posts.index') }}" class="rounded-lg bg-red-500 hover:bg-red-400 px-4 py-2"> Cancel </a>
            </div>
        </form>
    </div>
@endsection
