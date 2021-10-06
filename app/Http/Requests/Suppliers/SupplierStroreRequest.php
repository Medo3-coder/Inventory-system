<?php

namespace App\Http\Requests\Suppliers;

use Illuminate\Foundation\Http\FormRequest;

class SupplierStroreRequest extends FormRequest
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
            'name' => 'required|unique:suppliers|max:255',
            'email' => 'required|email',
            'phone' => 'required|unique:suppliers',
            'address' => 'required',
            'shopname' => 'required',
            'photo' => 'nullable',
            'newphoto' => 'nullable',
        ];
    }
}
