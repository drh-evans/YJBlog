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

        $comment = new Comment;
        $comment->post_id = $this->postId;
        $comment->user_id = auth()->id();
        $comment->content = $validatedData['content'];
        $comment->save();

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
        return view('livewire.commenthandler', ['comments'=>Comment::where('post_id', $this->postId)->latest()->paginate(5)]);
    }
}
