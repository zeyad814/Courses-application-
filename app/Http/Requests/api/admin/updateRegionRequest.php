<?php

namespace App\Http\Requests\api\admin;

use Illuminate\Foundation\Http\FormRequest;

class updateRegionRequest extends FormRequest
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
            'region' => 'required|min:4|max:30',
        ];
    }
}
