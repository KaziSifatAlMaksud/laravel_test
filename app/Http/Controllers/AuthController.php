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
            'username' =>'required|string|unique:users',
            'account_type' => 'required|string',
            'balance' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
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
            $user = User::where('email', $request->email)->first();
            if($user){
                session([
                    'email' => $user->email,
                    'name' => $user->name,
                    'user_id' =>$user->id,
                    'username'=>$user->username,
                    'account_type' => $user->account_type,
                    'balance' => $user->balance,
                    'created_at' => $user->created_at,                   
                ]);
          
            }
            // session(['email' => $request->email]);
            session(['status' => "logged_in"]);            
            return redirect()->intended('/');
           
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }
    
}
