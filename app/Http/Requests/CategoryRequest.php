<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_eng' => 'required',
            'category_ar' => 'required',
            'category_icon' => 'required',
        ];
    }

    public function messages()
    {
        return[
          'category_eng.required' => 'The Category Name English is required',
          'category_ar.required' => 'The Category Name Arabic is required',
          'category_icon.required' => 'The Icon is required',
        ];
    }
}
