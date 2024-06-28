<?php

namespace App\Http\Requests\api\admin\Major;

use Illuminate\Foundation\Http\FormRequest;

class createSubSubMajorRequest extends FormRequest
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
            'title'=>'required|min:3|max:30|unique:sub_sub_majors,title',
            'submajor_id'=>'required|integer|exists:sub_majors,id'
        ];
    }
}
