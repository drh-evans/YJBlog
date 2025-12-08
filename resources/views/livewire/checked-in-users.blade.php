<div class="mt-8 flex flex-col items-center">
    <h1 class="text-lg font-semibold">Users that have visited the {{ $stadium->name }}: </h1>
    <ul>
        @foreach ($checkedInUsers as $user)
            <li>
                <a href="{{ route('account.show', ['id' => $user->id]) }}"
                    class="text-[#EF8354] italic text-med hover:underline">&#64{{ $user->name }}</a>
            </li>
        @endforeach
    </ul>

    <div class="mt-6 mb-2 flex justify-center">
        {{ $checkedInUsers->links() }}
    </div>
</div>
