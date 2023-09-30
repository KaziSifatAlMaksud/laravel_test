<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'account_type' => 'required|string',
            'balance' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);
        User::create([
            'name' => $request->name,
            'account_type' => $request->account_type,
            'balance' => $request->balance,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully! You can now log in.');
    }


    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        if (Auth::attempt($credentials)) {
            session(['email' => $request->email]); 
            session(['status' => "logged_in"]);            
            return redirect()->intended('/');
           
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }
    
}
