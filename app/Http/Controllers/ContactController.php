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
    public function index() {
        return view('dashboard.contacts.index', [
            'messages' => Contact::where('status', 'unread')->get(),
            'contacts' => Contact::all()
        ]);
    }
    public function show($id) {
        
        $contact = Contact::findOrFail($id);
        $contact->update(['status' => 'read']);

        return view('dashboard.contacts.show', [
            'contact' => $contact,
            'messages' => Contact::where('status', 'unread')->get()
        ]); 
    }
    public function destroy(Contact $contact)
    {
        Contact::destroy($contact->id);
        return redirect('/dashboard/contacts')->with('success', 'Message has been deleted!');
    }
}
