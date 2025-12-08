<div style="text-align: center">
    <div class="flex flex-col items-center">
        @include('components.custom.error')
        <form wire:submit.prevent="submit">
            @csrf
            <textarea wire:model="content" placeholder="Add a comment..."
                class="mt-2 max-w-96 text-black bg-slate-300 rounded-lg w-full mb-2"></textarea>
            <button type="submit" class="rounded-lg bg-[#EF8354] hover:bg-[#d58867] px-4 py-2 font-semibold">Post
                Comment</button>
        </form>

        @foreach ($comments as $comment)
            <div wire:key="comment-{{ $comment->id }}"
                class="mt-4 w-[700px] border border-black rounded-md bg-[#BFC0C0]/20 shadow-md p-3">
                <p class="text-md">{{ $comment->content }}</p>
                <p class="italic text-sm mt-2"><a href="{{ route('account.show', ['id' => $comment->user_id]) }}"
                        class="hover:underline text-[#EF8354]">&#64{{ $comment->user->name }}</a>
                    Commented {{ $comment->updated_at->diffForHumans() }} ({{ $comment->created_at->format('d/m/Y') }})

                    @livewire('like-counter', ['likeableType' => 'comment', 'likeableId' => $comment->id], key('like-count-' . $comment->id))
                </p>

                @can('delete-comment', $comment)
                    <button wire:click="delete({{ $comment->id }})"
                        class="mt-2 rounded-lg bg-red-500 hover:bg-red-400 p-1 font-semibold">Delete</button>
                @endcan

                @can('like-model', $comment)
                    @livewire('like-button', ['likeableType' => 'comment', 'likeableId' => $comment->id], key('like-button-' . $comment->id))
                @endcan
            </div>
        @endforeach
        <div class="mt-3 flex justify-center">
            {{ $comments->links() }}
        </div>
    </div>
</div>
