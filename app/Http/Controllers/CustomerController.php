<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.customers.index', [
            'customers' => Customer::all(),
            'messages' => Contact::where('status', 'unread')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.customers.create', [
            'customers' => Customer::all(), 
            'messages' => Contact::where('status', 'unread')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'imgName' => 'required|max:60',
            'image' => 'image|file|max:2048'
        ]);  

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('customer-images');
        } // jika tdk ada maka gunakan image lama

        Customer::create($validatedData);

        return redirect('/dashboard/customers')->with('success', 'New Customer has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('dashboard.customers.edit', [
            'customer' => $customer,
            'messages' => Contact::where('status', 'unread')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'imgName' => 'required|max:60',
            'image' => 'image|file|max:2048'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('customer-images');
        }

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('customer-images');
        } 

        Customer::where('id', $customer->id)
             ->update($validatedData);
        
             return redirect('/dashboard/customers')->with('success', 'Customer has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        if ($customer->image) {
            Storage::delete($customer->image);
        }
        
        Customer::destroy($customer->id);
        return redirect('/dashboard/customers')->with('success', 'Portfolio has been deleted!');
    }
}
