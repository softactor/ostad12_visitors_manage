<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Contracts\Validation\ValidationRule;

class ResetPasswordRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            "token"=> "required|string",
            "email"=> "required|email|exists:users,email",
            "password"=> "required|string|min:6|confirmed"
        ];
    }

    public function messages(): array
    {
        return [
            "email.required"=> "Email is required",
            "email.email"=> "Required Valid email formate",
            "email.exists"=> "No user found with this email address",
            "token.required"=> "Token is required",
            "password.required"=> "Password is required",
            "password.min"=> "Password must be at least 6 char",
            "password.confirmed"=> "Password confirmation did not match",
        ];
    }
}
