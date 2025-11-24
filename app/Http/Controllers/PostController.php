<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(15);
        return view('posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required|string|max:250',
            'body'=>'required|string|max:500',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $p = new Post;
        $p->user_id=auth()->id();
        $p->title = $validatedData['title'];
        $p->body = $validatedData['body'];
        $p->like_count=0;
        
        if ($request->hasFile('image')) {
            $imageUrl = $request->file('image')->store('posts', 'public');;
            $p->post_url = $imageUrl;
        }
        $p->save();
        session()->flash('message', 'Post created successfully!');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $authorId = $post->user_id;
        $username = DB::table('users')->where('id', $authorId)->pluck('name');
        return view('posts.show', ['post'=>$post, 'username'=>$username]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
