<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        // Register information form.
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        // Return Json -> Create token (personal access token)-> return token only once ->hash
        return response()->json([
            'token' => $user->createToken('token')->plainTextToken # the 'token' in the apostrophe ('') just a label(name) of token, not values of it.
        ]);
    }

    public function login(Request $req)
    {
        if (!Auth::attempt($req->only('email', 'password')))
            {
                return response()->json(['message' => 'Unauhthorized - Không có quyền truy cập'],401);
            }
            $user = Auth::user();

            return response()->json([
                'token' => $user->createToken('token')->plainTextToken
            ]);
    }
}
