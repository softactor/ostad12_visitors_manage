<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email"=> "required|email",
            "password"=> "required|string"
        ]);

        $credentials = $request->only("email","password");

        try{    
            if(!$token = JWTAuth::attempt($credentials))
                {
                    return response()->json([
                        'success' => false,
                        'message'=> 'Invalid credentials'

                    ]);
                } 

            $user = Auth::user();
            return response()->json([
                        'success' => true,
                        'message'=> 'login successfull',
                        'data'=> [
                            'user' =>[
                                'id' => $user->id, 
                                'name' => $user->name, 
                                'email' => $user->email, 
                                'role' => $user->role, 
                            ],
                           'token' => $token, 
                           'token_type' => 'bearer', 
                           'token_expire_in' => auth()->factory()->getTTL() * 60
                        ]

                    ]);
            
            
        }catch(JWTException $e){
                return response()->json([
                        'success' => false,
                        'message'=> 'Could not create token'

                    ]);
        }
    }

    public function me()
    {
        return response()->json(Auth::user());
    }
}
