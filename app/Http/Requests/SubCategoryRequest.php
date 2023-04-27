<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'subcategory_eng' => 'required',
            'subcategory_ar' => 'required',
            'cate_id' => 'required',
        ];
    }

    public function messages()
    {
        return[
          'subcategory_eng.required' => 'The SubCategory Name English is required',
          'subcategory_ar.required' => 'The SubCategory Name Arabic is required',
          'cate_id.required' => 'Please, Choose A Category',
        ];
    }
}
