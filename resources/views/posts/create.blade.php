@extends('layouts.yjblayout')

@section('title', 'Create a post')

@section('content')

    <div class="content-center">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <p>Title: <input type="text" name="title" value="{{ old('title') }}" class="text-black"></p>
            <p>Body: <input type="text" name="body" value="{{ old('body') }}" class="text-black"></p>
            <p>Image: <input type="file" name="image" ></p>

            <input type="submit" value="Submit">
            <a href="{{ route('posts.index') }}"> Cancel </a>
        </form>
    </div>
@endsection