<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubSubCategoryRequest extends FormRequest
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
            'subsubcategory_eng' => 'required',
            'subsubcategory_ar' => 'required',
            'cate_id' => 'required',
            'subcate_id' => 'required',
        ];
    }

    public function messages()
    {
        return[
          'subsubcategory_eng.required' => 'The subSubCategory Name English is required',
          'subsubcategory_ar.required' => 'The subSubCategory Name Arabic is required',
          'cate_id.required' => 'Please, Choose A Category',
          'subcate_id.required' => 'Please, Choose A SubCategory',
        ];
    }
}
