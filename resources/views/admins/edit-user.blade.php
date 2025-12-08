@extends('layouts.yjblayout')

@section('title', 'Edit User')

@section('content')
    <div class="mt-4 flex flex-col items-center">

        @include('components.custom.error')

        <form method='POST' action="{{ route('admins.update', $user->id) }}">
            @method('PATCH')
            @csrf
            <select name="role_id">
                <option value="">Select Role...</option>
                <option value="1">
                    User
                </option>
                <option value="2">
                    Admin
                </option>
            </select>

            <div class="mt-2 flex justify-center gap-4">
                <button type="submit" class="rounded-lg bg-green-500 hover:bg-green-400 px-4 py-2"> Save Changes</button>
                <a href="{{ route('admin.users') }}" class="rounded-lg bg-gray-500 hover:bg-gray-400 px-4 py-2"> Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
