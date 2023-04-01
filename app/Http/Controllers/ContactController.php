<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create() {
        return view('contact', [
            'title' => "Contact Us"
        ]);
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:60',
            'email'  => 'required|email',
            'message' => 'required'
        ]);  

        Contact::create($validatedData);

        return redirect('/contact')->with('success', 'Your message has been sent');
    }
}
