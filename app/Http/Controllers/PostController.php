<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return the latest posts with 15 posts per page.
        return view('posts.index', [
            'posts'=>Post::latest()->paginate(9),
        ]);
    }

    public function myPosts()
    {
        return view('posts.index', ['posts'=>Post::where('user_id', auth()->id())->paginate(9)]);
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
        // validate that data meets the correct standards.
        $validatedData = $request->validate([
            'title'=>'required|string|max:70',
            'body'=>'required|string|max:500',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $p = new Post;
        $p->user_id=auth()->id();
        $p->title = $validatedData['title'];
        $p->body = $validatedData['body'];
        $p->like_count=0;
        
        // check if an image has been uploaded.
        if ($request->hasFile('image')) {
            $imageUrl = $request->file('image')->store('posts', 'public');;
            $p->post_url = $imageUrl;
        }
        $p->save();
        return redirect()->route('posts.index')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with(relations: 'user')->findOrFail($id);
        $comments = $post->comments()->with('user')->latest()->paginate(5);

        return view('posts.show', ['post'=>$post, 'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('edit-post', $post);
        return view('posts.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        Gate::authorize('edit-post', $post);

        $validatedData = $request->validate([
            'title'=>'nullable|string|max:250',
            'body'=>'required|string|max:500',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];

        // check if an image has been uploaded, delete any image and 
        if ($request->hasFile('image')) {
            if ($post->post_url) {
                Storage::delete('public/' . $post->post_url);
            }
            $imageUrl = $request->file('image')->store('posts', 'public');;
            $post->post_url = $imageUrl;
        }
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        Gate::authorize('delete-post', $post);

        if($post->post_url) {
            Storage::delete('public/' . $post->post_url);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }
}
