@extends('layouts.yjblayout')

@section('title', 'Users')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-10 justify-items-center mt-4 mb-4">
        @foreach ($accounts as $account)
            <div
                class="flex flex-col items-center w-72 h-52 p-6 text-black bg-[#BFC0C0]/30 border-[#BFC0C0]/20 rounded-sm shadow-lg">
                <a class="hover:underline" href="{{ route('accounts.show', ['id' => $account->id]) }}">
                    {{ $account->display_name }}</a>
                <a class="text-sm italic text-[#EF8354] hover:underline"
                    href="{{ route('accounts.show', ['id' => $account->id]) }}">
                    &#64{{ $account->user->name }}</a>
            </div>
        @endforeach
    </div>
@endsection
