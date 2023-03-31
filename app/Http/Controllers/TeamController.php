<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.teams.index', [
            'teams' => Team::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'profession' => 'required|max:80',
            'image' => 'image|file|max:2048'  
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('team-images');
        } 

        Team::create($validatedData);

        return redirect('/dashboard/teams')->with('success', 'Team Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('dashboard.teams.edit', [
            'team' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'profession' => 'required|max:80',
            'image' => 'image|file|max:2048'  
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('team-images');
        }

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('team-images');
        } 

        Team::where('id', $team->id)
             ->update($validatedData);
        
        return redirect('/dashboard/teams')->with('success', 'Team Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        if ($team->image) {
            Storage::delete($team->image);
        }
        
        Team::destroy($team->id);
        return redirect('/dashboard/teams')->with('success', 'Team has been deleted!');
    }
}
