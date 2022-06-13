<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json([
                'status' => false,
                'message' => "Login Failed",
            ], 401);
        } else {
            return $this->respondWithToken($token);
        }
    }

    public function logout()
    {
        auth()->logout();

        return response()->json([
            'status' => false,
            'message' => "Logout Success",
        ], 200);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => false,
            'message' => "Login Failed",
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                // 'user' => auth()->user(),
                'expires_in' => auth()->factory()->getTTL() * 60 * 24
            ],
        ], 200);
    }
}
