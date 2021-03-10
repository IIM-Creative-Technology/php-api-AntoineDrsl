<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() 
    {
        $credentials = request(['email', 'password']);
        $token = auth()->attempt($credentials);

        if(!$token) {
            return response()->json('Unauthorized', 401);
        }

        return $this->respondWithToken($token);
    }

    public function respondWithToken(string $token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function logout()
    {
        try {
            auth()->logout();
        } catch(Exception $e) {
            return response()->json($e->getMessage(), 401);
        }

        return response()->json(['message' => 'Logged out']);
    }

    public function guard()
    {
        return Auth::guard();
    }
}
