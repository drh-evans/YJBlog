@extends('layouts.yjblayout')

<!-- Image credits: https://unsplash.com/photos/soccer-stadium-C-TNT-R0cho-->
@section('content')
    <div class="class= bg-no-repeat bg-cover bg-center bg-fixed flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col"
        style="background-image: url('/images/dashboardbg.png')">
        <span
            class="bg-gradient-to-r from-yellow-600 via-yellow-400 to-yellow-200 bg-clip-text text-transparent text-6xl font-extrabold">
            Welcome to the club, {{ auth()->user()->name }}!</span>

        <div class="mt-4 flex flex-row gap-4">
            <a href="{{ route('posts.index') }}"
                class="px-5 py-1.5 border-white/20 hover:border-white/20 bg-white/30 text-slate-800 rounded-lg backdrop-blur-sm text-normal leading-normal">
                Forum</a>

            <a href="{{ route('account.edit', auth()->id()) }}"
                class="px-5 py-1.5 border-white/20 hover:border-white/20 bg-white/30 text-slate-800 rounded-lg backdrop-blur-sm text-normal leading-normal">
                Profile</a>
        </div>
    </div>
@endsection
