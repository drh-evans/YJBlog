<div style="text-align: center">
    <div>
        @include('components.custom.error')
        <form wire:submit.prevent="submit">
            <textarea wire:model="content" placeholder="Add a comment..." class="mt-2 text-black bg-slate-300 rounded-lg w-full mb-2"></textarea>
            <button type="submit" class="rounded-lg bg-blue-500 hover:bg-blue-400 px-4 py-2">Post Comment</button>
        </form>
    </div>

    @foreach ($comments as $comment)
        <div class="mt-4">
            {{ $comment->content }}
            <p class="italic text-sm">Posted by <a href="{{ route('accounts.show', ['id' => $comment->user_id]) }}"
                    class="hover:underline hover:text-blue-300">{{ $comment->user->name }}</a> on
                {{ $comment->created_at->format('d/m/Y') }} at
                {{ $comment->created_at->format('g:i A T') }}<br>
                Last updated {{ $comment->updated_at->diffForHumans() }}</p>
        </div>
    @endforeach
    <div class="mt-3">
        {{ $comments->links() }}
    </div>
</div>
