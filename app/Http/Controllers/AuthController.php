<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
            /**
            * Login api
            *
            * @return \Illuminate\Http\Response
            */
            public function login(Request $request)
            {
                $credentials = $request->only('email', 'password');
        
                if (Auth::attempt($credentials)) {
                    $user = Auth::user();
                    $token = $user->generateApiToken();
        
                    return response()->json(['api_token' => $token]);
                }
        
                return response()->json(['message' => 'Invalid credentials'], 401);
            }      
}
