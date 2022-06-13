<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function get_by_id()
    {
        $data = User::where('id', '=', auth()->id())->first();

        return response()->json([
            'status' => true,
            'message' => "User Detail",
            'data' => $data
        ], 200);
    }
}
