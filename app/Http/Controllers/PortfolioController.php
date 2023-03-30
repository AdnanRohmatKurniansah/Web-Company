<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.portfolios.index', [
            "portfolios" => Portfolio::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'projectName' => 'required|max:60',
            'service_id' => 'required',
            'image' => 'image|file|max:2048'
        ]);  

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('service-images');
        } // jika tdk ada maka gunakan image lama

        Portfolio::create($validatedData);

        return redirect('/dashboard/portfolios')->with('success', 'Portfolio Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('dashboard.portfolios.edit', [
            'portfolio' => $portfolio,
            'services' => Service::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validatedData = $request->validate([
            'projectName' => 'required|max:60',
            'service_id' => 'required',
            'image' => 'image|file|max:2048'
        ]);  

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('portfolio-images');
        } // jika tdk ada maka gunakan image lama

        Portfolio::create($validatedData);
        
        return redirect('/dashboard/portfolios')->with('success', 'Portfolio has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::delete($portfolio->image);
        }
        
        Portfolio::destroy($portfolio->id);
        return redirect('/dashboard/portfolios')->with('success', 'Portfolio has been deleted!');
    }
}
