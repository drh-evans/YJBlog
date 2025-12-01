@extends('layouts.yjblayout')

@section('title', 'Dashboard')

@section('content')
    <p class="text-red-500">YJBlog will soon have many different pages! For now I've laid it out like this until I make a
        navbar!</p>
    <p>
        <a href="{{ route('posts.index') }}" class="text-blue-500">Posts</a>
    </p>
@endsection
