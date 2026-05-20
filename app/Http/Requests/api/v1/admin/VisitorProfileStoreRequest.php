<?php

namespace App\Http\Requests\api\v1\admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VisitorProfileStoreRequest extends FormRequest
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
            'visitor_id' => ['required', 'exists:visitors,id', 'unique:visitor_profiles,visitor_id'],
            'prefession' => ['nullable', 'string', 'max:100'],
            'emergency_contact' => ['nullable', 'max:100'],
            'dob' => ['nullable', 'date'],
        ];
    }
}
