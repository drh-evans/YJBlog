<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\Comment;

class LikeButton extends Component
{

    public Model $likeableModel;
    public string $likeableType;
    public int $likeableId;
    public bool $liked = false;
    public function mount($likeableType, $likeableId) 
    {
        // Find the specific model based on the input.
        if ($likeableType == 'post') {
            $this->likeableModel = Post::findOrFail($likeableId);
        } elseif ($likeableType == 'comment') {
            $this->likeableModel = Comment::findOrFail($likeableId);
        }
        
        // Check if a like already exists in the system.
        $this->liked = $this->likeableModel->likes()->where('user_id', auth()->id())->exists();
    }

    public function like()
    {
        // Check that the user is not the poster.
        Gate::authorize('like-model', $this->likeableModel);

        // Remove a like if the button has been clicked and it's already liked, otherwise add it.
        if ($this->liked) {
            $this->likeableModel->likes()->where('user_id', auth()->id())->delete();
            $this->liked = false;
        } else {
            $this->likeableModel->likes()->create(['user_id' => auth()->id()]);
            $this->liked = true;
        }

        $this->dispatch('likeClicked');
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
