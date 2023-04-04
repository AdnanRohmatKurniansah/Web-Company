<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index() {
        return view('auth.login', [
            'title' => "Login"
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard/index')->with('toast_success', 'Login Successfuly');
        }
        return back()->with('toast_error', 'Login failed');
        
    }
    public function logout() {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
    public function show() {
        return view('auth.update-password', [
            'messages' => Contact::where('status', 'unread')->get()
        ]);
    }
    public function updatePassword(Request $request) {
        //validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        //match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with('toast_error', "Old Password Doesn't match!");
        }


        //update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('toast_success', "Password changed successfully!");
    }
    public function register() {
        return view('auth.register', [
            'messages' => Contact::where('status', 'unread')->get() 
        ]);
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255' 
        ]);

        //$validatedData['password'] = bcrypt($validatedData['password']);

        $validatedData['password'] = Hash::make($validatedData['password']);
        // pake metode hash yg sudah tersedia (sama seperti bcrypt )
        
        User::create($validatedData);
        
        //$request->session()->flash('success', 'Registration successfull! Please login ');
        
        return redirect('/dashboard/index')->with('success', 'New admin added successfully');
    }
}
