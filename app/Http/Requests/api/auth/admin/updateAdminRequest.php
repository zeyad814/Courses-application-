<?php

namespace App\Http\Requests\api\auth\admin;

use Illuminate\Foundation\Http\FormRequest;

class updateAdminRequest extends FormRequest
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
            'email'=>"required|email",
            "final_salary"=>"required|numeric",
            'working_place'=>"required",
            'status'=>"required|in:1,0"
        ];
    }
    public function messages(){
        return [
            'name.min'=>"please enter your full name"
        ];
    }
}
