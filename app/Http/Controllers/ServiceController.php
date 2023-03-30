<?php

namespace App\Http\Controllers;

use App\Models\Service;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.services.index', [
            "services" => Service::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|max:20',
            'desc' => 'required|max:150',
            'image' => 'image|file|max:2048'
        ]);  

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('service-images');
        } // jika tdk ada maka gunakan image lama

        Service::create($validatedData);

        return redirect('/dashboard/services')->with('success', 'Service Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('dashboard.services.edit', [
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'type' => 'required|max:20',
            'desc' => 'required|max:150',
            'image' => 'image|file|max:2048'  
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('service-images');
        }

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('service-images');
        } 

        Service::where('id', $service->id)
             ->update($validatedData);
        
        return redirect('/dashboard/services')->with('success', 'Service Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::delete($service->image);
        }
        
        Service::destroy($service->id);
        return redirect('/dashboard/services')->with('success', 'Service has been deleted!');
    }
}
