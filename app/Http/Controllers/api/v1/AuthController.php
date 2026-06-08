<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\ForgetPasswordrequest;
use App\Http\Requests\api\v1\LoginRequest;
use App\Http\Requests\api\v1\ResetPasswordRequest;
use App\Mail\PasswordResetMail;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        $credentials = $request->only("email", "password");

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials'

                ]);
            }

            $user = Auth::user();
            return response()->json([
                'success' => true,
                'message' => 'login successfull',
                'data' => [
                    'user' => [
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
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Could not create token'

            ]);
        }
    }

    public function me()
    {
        return response()->json(Auth::user());
    }

    // handle forget password

    public function forgotpassword(ForgetPasswordrequest $request)
    {
        $email = $request->email;

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'No user found with this email address'

            ]);
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => $token,
                'created_at' => now(),
            ]
        );


        try {

            Mail::to($email)->send(new PasswordResetMail($token, $email, $user->name));
        } catch (\Exception $e) {
            return response()->json([
                'success' => 'false',
                'message' => 'failed to send email',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function resetPassword(ResetPasswordRequest $request)
    {
        $email = $request->email;
        $token = $request->token;
        $password = $request->password;
        // $allpassword = 'call api';
        // if(in_array($allpassword, $password)){
        //         return 
        // }

        $tokenValidated = DB::table('password_reset_tokens')
            ->where([
                'email' => $email,
                'token' => $token,
            ])->first();

        if (!$tokenValidated) {
            return response()->json([
                'success' => false,
                'message' => 'Token is invalid'

            ]);
        }

        // if token expired
        $tokenCreatedDate = strtotime($tokenValidated->created_at);
        $currentTime = time();

        $tokenAge = ($currentTime - $tokenCreatedDate) / 60;

        if ($tokenAge > 60) {

            DB::table('password_reset_tokens')->where('émail', $email)->delete();
            return response()->json([
                'success' => false,
                'message' => 'Token has expired'

            ]);
        }

        //update password:

        $user = User::where('email', $email)->first();

        $user->password = $password;
        $user->save();

        // delete the token:
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Password reset successfully'

        ]);
    }
}
