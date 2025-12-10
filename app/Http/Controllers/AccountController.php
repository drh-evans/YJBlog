<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Club;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::latest()->paginate(9);

        return view('accounts.index', ['accounts'=>$profiles]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = Profile::with(['user'])->findOrFail($id);
        $posts = Post::where('user_id', $profile->id)->latest();
        $comments = Comment::where('user_id', $profile->id)->latest();
        $club = Club::findOrFail(id: $profile->favourite_club_id);

        $totalComments = $comments->count();
        $totalPosts = $posts->count();

        return view('accounts.show', ['account'=>$profile, 'posts'=>$posts->paginate(5), 
        'comments'=>$comments->paginate(5), 'club'=>$club, 
        'totalComments'=>$totalComments, 'totalPosts'=>$totalPosts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Profile::with(['club'])->findOrFail($id);
        Gate::authorize('edit-profile', $profile);

        $clubs = DB::table('clubs')->orderBy('name')->get();
        return view('accounts.edit', ['account'=>$profile, 'clubs'=>$clubs]);
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
            'favourite_club_id'=>'required|integer'
        ]);

        $profile->display_name = $validatedData['display_name'];
        $profile->description = $validatedData['description'];
        $profile->favourite_club_id = $validatedData['favourite_club_id'];

        $profile->save();

        return redirect()->route('account.show', ['id' => $id])->with('success', 'Profile updated');
    }
}
