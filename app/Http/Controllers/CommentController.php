<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate that data meets the correct standards.
        $validatedData = $request->validate([
            'content'=>'required|string|max:300',
        ]);

        $c = new Comment();
        $c->user_id=auth()->id();
        $c->save();
        return redirect()->route('posts.index')->with('success', 'Comment added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::with('user')->findOrFail($id);

        return view('comments.show', ['comment'=>$comment, 'post'=>$comment->post]);
    }
}
