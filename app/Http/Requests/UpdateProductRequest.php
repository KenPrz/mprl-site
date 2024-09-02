<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Update with proper authorization if needed
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            'power_out' => 'required|string|max:255',
            'efficiency' => 'string|max:255',
            'dimension' => 'string|max:255',
            'weight' => 'string|max:255',
            'type' => 'required|string|max:255',
            'voltage' => 'string|max:255',
            'current' => 'string|max:255',
            'temp_coeff' => 'string|max:255',
            'price' => 'numeric',
            'discount' => 'nullable|numeric',
            'warranty' => 'string|max:255',
            'stock_level' => 'integer',
            'supplier' => 'string|max:255',
            'certification' => 'string|max:255',
            'description' => 'nullable|string',
            'is_displayed' => 'boolean',
            'img_path.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Adjust as needed
        ];
    }
}
