<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.slides.index', [
            'slides' => Slide::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mainTitle' => 'required|max:25',
            'subTitle' => 'required|max:45',
            'image' => 'image|file|max:2048'    
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('slide-images');
        } 

        Slide::create($validatedData);

        return redirect('/dashboard/slides')->with('success', 'New Slide has been added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        return view('dashboard.slides.edit', [
            'slide' => $slide
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        $validatedData = $request->validate([
            'mainTitle' => 'required|max:25',
            'subTitle' => 'required|max:45',
            'image' => 'image|file|max:2048'    
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('slide-images');
        }

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('slide-images');
        } 

        Slide::where('id', $slide->id)
             ->update($validatedData);
        
        return redirect('/dashboard/slides')->with('success', 'Slide has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        if ($slide->image) {
            Storage::delete($slide->image);
        }
        
        Slide::destroy($slide->id);
        return redirect('/dashboard/slides')->with('success', 'Slide has been deleted!');
    }
}
