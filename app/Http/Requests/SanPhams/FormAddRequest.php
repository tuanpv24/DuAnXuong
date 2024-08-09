<?php

namespace App\Http\Requests\SanPhams;

use Illuminate\Foundation\Http\FormRequest;

class FormAddRequest extends FormRequest
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
        $rules= [
            "name" => "required",
            // "price" => "required|integer|min:1000",
            // "quantity" => "required|integer|min:1",
            'image' => 'required|image',
        ];
        if ($this->input('selectedType') === '1') {
            $rules['price'] = 'required|integer|min:1000';
            $rules['quantity'] = 'required|integer|min:1';
            $rules['price-variant.*'] = 'nullable|integer|min:1000';
            $rules['quantity-variant.*'] = 'nullable|integer|min:1';
        } else {
            $rules['price'] = 'nullable|integer|min:1000';
            $rules['quantity'] = 'nullable|integer|min:1';
            $rules['price-variant.*'] = 'required|integer|min:1000';
            $rules['quantity-variant.*'] = 'required|integer|min:1';
        }
    
        return $rules;
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'Không được để trống sản phẩm',
            'price.required' => 'Không được để trống giá',
            'price.integer' => 'Giá phải là số nguyên',
            'price.min' => 'Giá nhỏ nhất phải trên 1000',
            'quantity.required' => 'Không được để trống số lượng',
            'quantity.integer' => 'Số lượng phải là số nguyên',
            'quantity.min' => 'Số lượng nhỏ nhất phải trên 1',
            'image.required' => 'Không được để trống ảnh sản phẩm',
            'image.image' => 'Vui lòng chọn file có định dạng là ảnh',
            'price-variant.*.required' => 'Không được để trống giá',
            'price-variant.*.integer' => 'Giá phải là số nguyên',
            'price-variant.*.min' => 'Giá nhỏ nhất phải trên 1000',
            'quantity-variant.*.required' => 'Không được để trống số lượng',
            'quantity-variant.*.integer' => 'Số lượng phải là số nguyên',
            'quantity-variant.*.min' => 'Số lượng nhỏ nhất phải trên 1',
        ];
    }
}