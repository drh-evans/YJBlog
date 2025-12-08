@extends('layouts.yjblayout')

@section('title', 'All Users')

@section('content')
    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}"
            class="ml-2 px-2 py-2 border-[#EF8354]/90 bg-[#EF8354] text-slate-800 rounded-lg text-md font-semibold hover:underline hover:bg-[#d58867]">Return</a>
    </div>
    <div class="mt-6 mb-6 flex flex-col items-center">
        <p class="text-lg font-bold">As a superadmin you may enhance or reduce the permissions of other users.</p>
        <div class="text-center flex flex-col items-center">
            @foreach ($users as $user)
                <div class="mt-4 w-[700px] border border-black rounded-md bg-[#BFC0C0]/20 shadow-md p-3">
                    <p> <a href="{{ route('account.show', ['id' => $user->id]) }}"
                            class="hover:underline text-[#EF8354] text-md">
                            &#64{{ $user->name }}
                        </a> - {{ $user->role->name }}
                        <br>Member since {{ $user->created_at->format('d/m/Y') }}
                    </p>

                    <div class="mt-2 flex justify-center gap-4">
                        @can('edit-admins')
                            <a href="{{ route('admins.edit-user', $user->id) }}"
                                class="rounded-lg bg-gray-500 hover:bg-gray-400 px-3 py-1 font-semibold">
                                Edit Role</a>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    @endsection
