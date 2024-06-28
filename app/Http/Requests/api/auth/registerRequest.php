<?php

namespace App\Http\Requests\api\auth;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:30|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|max:255',
            'gender' => 'required|in:male,female',
            'phone' => 'required',
            'region_id' => 'required|integer',
            'age' => 'required|integer|min:14|max:50',
        ];
    }
}
