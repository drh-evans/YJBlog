<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.index');
    }

    public function postsIndex() {
        return(view('admins.posts', ['posts' => Post::latest()->paginate(10)]));
    }

    public function commentsIndex () {
        return(view('admins.comments', ['comments' => Comment::latest()->paginate(10)]));
    }

    public function usersIndex () {
        return(view('admins.users', ['users'=>User::orderBy('name', 'asc')->paginate(10)]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        Gate::authorize('edit-admins', $user);
        return view('admins.edit-user', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        Gate::authorize('edit-admins');

        $validatedData = $request->validate([
            'role_id'=>'required|integer',
        ]);

        $user->role_id = $validatedData['role_id'];

        $user->save();

        return redirect()->route('admin.users')->with('success', 'User updated');
    }
}
