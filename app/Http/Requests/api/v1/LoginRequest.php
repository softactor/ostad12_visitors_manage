<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends ApiFormRequest
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
            "email"=> "required|email",
            "password"=> "required|string|min:6"
        ];
    }


    public function messages(): array
    {
        return [
            "email.required"=> "Email is required",
            "email.email"=> "Required Valid email formate",
            "password.required"=> "Password is required",
            "password.string"=> "password must be string",
            "password.min"=> "password minimum 6 length"
        ];
    }



}
