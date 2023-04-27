<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'brand_eng' => 'required',
            'brand_ar' => 'required',
            'brand_img' => 'required',
        ];
    }

    public function messages()
    {
        return[
          'brand_eng.required' => 'The Brand Name English is required',
          'brand_ar.required' => 'The Brand Name Arabic is required',
          'brand_img.required' => 'The Image is required',
        ];
    }
}
