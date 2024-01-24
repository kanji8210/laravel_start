<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only("email","password");
    if($token = JWTAuth::attempt($credentials)) {
        return response()->json(['token' => $token], 200);
    }
    return response()->json(['error'=> 'login failed'], 401);

}
}
