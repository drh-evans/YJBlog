<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use App\Models\Comment;

class CommentHandler extends Component
{
    use WithPagination;

    public $postId;
    public $content;
    public function mount($id) {
        $this->postId = $id;
    }

    public function submit() {

        $validatedData = $this->validate([
            'content'=>'required|string|max:500',
        ]);


        Comment::create([
            'post_id' => $this->postId,
            'user_id' => auth()->id(),
            'content' => $validatedData['content'],
        ]);

        $this->reset('content');

        session()->flash('message', 'Comment added!');
    }

    public function delete($commentId) {
        $comment = Comment::findOrFail($commentId);
        Gate::authorize('delete-comment', $comment);
        $comment->delete();
        session()->flash('message', 'Comment deleted!');
    }
    public function render()
    {
        $comments = Comment::with(['user', 'likes'])
                    ->where('post_id', $this->postId)
                    ->latest()
                    ->paginate(5);
        return view('livewire.commenthandler', ['comments'=>$comments]);
    }
}
