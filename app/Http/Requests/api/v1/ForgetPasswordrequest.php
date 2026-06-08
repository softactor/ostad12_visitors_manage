<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Contracts\Validation\ValidationRule;

class ForgetPasswordrequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email"=> "required|email|exists:users,email",
        ];
    }

    public function messages(): array
    {
        return [
            "email.required"=> "Email is required",
            "email.email"=> "Required Valid email formate",
            "email.exists"=> "No user found with this email address",
        ];
    }
}
