<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stadium;

class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all stadiums in descending order, 10 per page.
        return view('stadiums.index', [
            'stadiums'=>Stadium::orderBy('name', 'desc')->paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id'=>'required|integer',
        ]);

        $currentUser = auth()->user();

        // check in the user

        $currentUser->stadiums()->attach($validatedData['id']);

        return view('stadiums.index')->with('success', 'Checked in!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // the current stadium
        $stadium = Stadium::findOrFail($id);
        
        // check if the current user has visited said stadium.
        $hasVisited = auth()->user()->stadiums->contains($id);

        // the total amount of visits to that stadium by users.
        $totalVisits = $stadium->users()->count();

        return view('stadiums.show', ['stadium'=>$stadium,'visited'=>$hasVisited, 'totalVisits'=>$totalVisits]);
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
}
