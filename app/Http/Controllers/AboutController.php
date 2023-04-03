<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.abouts.index', [
            "abouts" =>  About::all(),
            'messages' => Contact::where('status', 'unread')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.abouts.create', [
            'messages' => Contact::where('status', 'unread')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:40',
            'desc' => 'required',
            'image' => 'image|file|max:2048'
        ]);  
     
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('about-images');
        } // jika tdk ada maka gunakan image lama

        About::create($validatedData);
        
        return redirect('/dashboard/abouts')->with('success', 'New about has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('dashboard.abouts.edit', [
            'about' => $about,
            'messages' => Contact::where('status', 'unread')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:40',
            'desc' => 'required',
            'image' => 'image|file|max:2048'  
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('about-images');
        }

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('about-images');
        } 

        About::where('id', $about->id)
             ->update($validatedData);
        
        return redirect('/dashboard/abouts')->with('success', 'About Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        if ($about->image) {
            Storage::delete($about->image);
        }
        
        About::destroy($about->id);
        return redirect('/dashboard/abouts')->with('success', 'About has been deleted!');
    }
}
