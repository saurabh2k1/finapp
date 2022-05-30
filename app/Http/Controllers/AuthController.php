<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mcap;

class AuthController extends Controller
{
    
    /**
     * adding middleware
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * login function for api
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        $token = auth('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user =auth('api')->user();
        return response()->json([
            // 'status' => 'success',
            // 'user' => $user,
            // 'authorisation' => [
            //     'token' => $token,
            //     'type' => 'bearer',
            'name' => $user->name,
            'email' => $user->email,
            'token' => $token,
            'profile' => $user->profile_photo_url,
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }
    
    /**
     * to refresh jwt token
     */
    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

    public function getDashboard()
    {
        $mcap_query = Mcap::latest()->first();
        $mcap = $mcap_query->mcap;
        $mcap_date = $mcap_query->ason_date;
        $networth = $mcap_query->networth;

        return response()->json([$mcap_query], 200);
    }
}
