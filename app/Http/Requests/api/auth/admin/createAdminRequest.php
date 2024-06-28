<?php

namespace App\Http\Requests\api\auth\admin;

use Illuminate\Foundation\Http\FormRequest;

class createAdminRequest extends FormRequest
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
            'name'=>"required|min:8|max:30",
            'email'=>"required|email|unique:admins,email",
            'password'=>"required|min:6|max:255|confirmed",
            "final_salary"=>"required|numeric",
            "status"=>"required|in:0,1",
            "working_place"=>"required"
        ];
    }
}
