<?php

namespace App\Http\Requests\api\admin\course;

use Illuminate\Foundation\Http\FormRequest;

class createCourseRequest extends FormRequest
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
            'name'=>"required|string|min:3|max:255",
            "major_id"=>"required|integer|exists:majors,id|",
            "sub_major_id"=>"required|integer|exists:sub_majors,id",
            "sub_sub_major_id"=>"nullable|integer|exists:sub_sub_majors,id",
            "description"=>"required|min:15|string",
            "price"=>"required|min:0|numeric",
            "discount"=>"nullable|integer|min:0|max:99" 
        ];
    }
}
