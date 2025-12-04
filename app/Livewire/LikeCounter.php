<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;


class LikeCounter extends Component
{
    public Model $likeableModel;
    public int $likeCount = 0;
    protected $listeners = ['likeClicked'=>'refreshLikes'];

    public function mount($likeableType, $likeableId) {
        if ($likeableType == 'post') {
            $this->likeableModel = Post::findOrFail($likeableId);
        } elseif ($likeableType == 'comment') {
            $this->likeableModel = Comment::findOrFail($likeableId);
        }
        $this->likeCount = $this->likeableModel->likes()->count();
    }

    public function refreshLikes() {
        $this->likeCount = $this->likeableModel->likes()->count();
    }
    public function render()
    {
        return view('livewire.like-counter');
    }
}
