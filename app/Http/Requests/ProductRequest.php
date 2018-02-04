<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sltParent' => 'required',
            'txtName' => 'required|unique:products,name',
            'fImages' => 'required|image'
        ];
    }

    public function messages() {
        return [
            'sltParent.required' => 'Please choose category',
            'txtName.required' => 'Please enter name product',
            'txtName.unique' => 'Product name is exitst',
            'fImages.required' => 'Please choose Images',
            'fImages.image' => 'This file is not Image'
        ];
    }
}
