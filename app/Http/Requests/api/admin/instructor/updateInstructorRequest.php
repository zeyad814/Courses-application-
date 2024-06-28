<?php

namespace App\Http\Requests\api\admin\instructor;

use Illuminate\Foundation\Http\FormRequest;

class updateInstructorRequest extends FormRequest
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
            'name'=>"required|min:5|max:50",
            'email'=>"required|email",
            'bio'=>"required",
            'phone'=>"required|starts_with:010,011,012,015",
            'role'=>"required",
            'salary'=>"nullable|numeric",
            'major_id'=>"required|integer|exists:majors,id",
            'sub_major_id'=>"nullable|exists:sub_majors,id",
            "sub_sub_majors"=>"nullable|exists:sub_sub_majors,id",
        ];
    }
}
