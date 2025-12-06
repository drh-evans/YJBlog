@extends('layouts.yjblayout')

@section('title', 'Edit Profile')

@section('content')

    <div class="mt-4 flex flex-col items-center">

        @include('components.custom.error')

        <form method='POST' action="{{ route('account.update', $account->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <input type="text" name="display_name" placeholder="Change your display name..."
                value="{{ old('title', $account->display_name) }}" class=" text-black bg-slate-300 rounded-lg w-full mb-2">
            <textarea name="description" placeholder="Describe yourself..."
                class="mt-2 text-black bg-slate-300 rounded-lg w-full mb-2">{{ old('body', $account->description) }}</textarea>

            <select name="favourite_club_id" id="favourite_club_id">
                @foreach ($clubs as $club)
                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                @endforeach
            </select>

            <div class="mt-2 flex justify-center gap-4">
                <button type="submit" class="rounded-lg bg-green-500 hover:bg-green-400 px-4 py-2"> Save </button>
                <a href="{{ route('accounts.index') }}" class="rounded-lg bg-gray-500 hover:bg-gray-400 px-4 py-2"> Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
