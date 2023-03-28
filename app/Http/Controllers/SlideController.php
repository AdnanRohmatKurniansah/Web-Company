<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use \Cviebrock\EloquentSluggable\Sluggable;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image-name' => 'required|max:60',
            'slug' => 'required|unique:slides',
            'image' => 'image|file|2048'    
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('slide-images');
        } 

        Slide::create($validatedData);

        return redirect('/dashboard/slides/index')->with('success', 'New Slide has been added!');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Slide::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
