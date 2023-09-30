<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
        public function create(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'account_type' => 'required|string',
        ]);

        $user = User::create($validatedData);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

}
