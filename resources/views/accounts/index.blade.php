@extends('layouts.yjblayout')

@section('title', 'Fans')

@section('content')

    <div class="ml-4 flex flex-col items-center">
        <p class="text-lg"> We make you an account by default, but you might want to customise it!</p>
        <a class="p-1 border-[#4F5D75]/90 mt-2 bg-[#4F5D75] text-[#BFC0C0] rounded-lg backdrop-blur-sm text-md hover:bg-[#888c92] font-bold text-sm"
            href="{{ route('account.edit', auth()->id()) }}">Customise
            Account</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 justify-items-center mt-4 mb-4">
        @foreach ($accounts as $account)
            <div
                class="flex flex-col items-center w-72 h-52 p-6 text-black bg-[#BFC0C0]/30 border-[#BFC0C0]/20 rounded-sm shadow-lg">
                <a class="hover:underline text-lg font-bold" href="{{ route('account.show', ['id' => $account->id]) }}">
                    {{ $account->display_name }}</a>
                <a class="text-sm italic text-[#EF8354] font-semibold hover:underline"
                    href="{{ route('account.show', ['id' => $account->id]) }}">
                    &#64{{ $account->user->name }}</a>

                <p class="text-sm text-center mt-4">{{ $account->description }}</p>

                <a class="mt-4 p-2 border-[#4F5D75]/90 bg-[#4F5D75] text-[#BFC0C0] rounded-lg backdrop-blur-sm text-md hover:bg-[#888c92] font-bold text-sm"
                    href="{{ route('account.show', ['id' => $account->id]) }}"> View</a>
            </div>
        @endforeach
    </div>

    <div class="mt-6 mb-2 flex justify-center">
        {{ $accounts->links() }}
    </div>
@endsection
