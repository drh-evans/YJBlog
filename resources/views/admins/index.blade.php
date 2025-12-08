@extends('layouts.yjblayout')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="mt-6 flex flex-col items-center">
        <div class="mt-4 w-[800px] border border-black rounded-md bg-[#BFC0C0]/20 shadow-md p-3 text-center">
            <p class="font-semibold text-lg">As an admin you have privileges to delete content across the site if it violates
                our rules. <br>
                Please ensure that the site remains a safe-space for all fans and that inappropriate content is removed!</p>
            <p class="italic text-md"> If you are found to abuse your privileges a superadmin may remove your privileges.</p>
        </div>

        <div class="mt-6 flex flex-row gap-4 text-slate-800">
            <a href="{{ route('admin.posts') }}" class="rounded-lg bg-gray-500 hover:bg-gray-400 px-3 py-1 font-semibold">View
                All Posts</a>
            <a href="{{ route('admin.comments') }}"class="rounded-lg bg-gray-500 hover:bg-gray-400 px-3 py-1 font-semibold">View
                All Comments</a>
            @can('edit-admins')
                <a href="{{ route('admin.users') }}"class="rounded-lg bg-gray-500 hover:bg-gray-400 px-3 py-1 font-semibold">View
                    All Users</a>
            @endcan
        </div>
    </div>
@endsection
