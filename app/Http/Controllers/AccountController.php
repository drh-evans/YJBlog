<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Comment;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('accounts.index', ['accounts'=>Profile::latest()->paginate(9)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = Profile::with(['club', 'user'])->findOrFail($id);
        $posts = Post::where('user_id', $profile->id)->latest()->paginate(10);
        $comments = Comment::where('user_id', $profile->id)->latest()->paginate(10);
        return view('accounts.show', ['account'=>$profile, 'posts'=>$posts, 'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Profile::findOrFail($id);
        Gate::authorize('edit-profile', $profile);
        return view('accounts.edit', ['profile'=>$profile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profile = Profile::findOrFail($id);

        Gate::authorize('edit-profile', $profile);

        $validatedData = $request->validate([
            'display_name'=>'required|string|max:20',
            'description'=>'required|string|max:300',
            'favourite_club_id'=>'nullable|integer'
        ]);

        $profile->display_name = $validatedData['display_name'] ?? $profile->display_name;
        $profile->description = $validatedData['description'];
        $profile->favourite_club_id;

        $profile->save();

        return redirect()->route('accounts.show', ['id' => $id])->with('success', 'Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
