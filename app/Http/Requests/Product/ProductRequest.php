<?php

namespace App\Http\Requests\Product;

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

            'product_name' => 'required|max:255',
            'product_code' => 'required|unique:products',
            'root' => 'required|unique:products',
            'buying_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'buying_date' => 'required',
            'image' => 'nullable',
            'product_quantity' => 'required',
            'category_id' => 'required|numeric',
            'supplier_id' => 'required|numeric',
            'newimage' => 'nullable',

        ];
    }
}
