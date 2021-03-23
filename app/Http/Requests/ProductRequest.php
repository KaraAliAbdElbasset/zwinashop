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
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:200',
            'fournisseur' => 'required|string|max:200',
            'excerpt' => 'required|string|max:200',
            'description' => 'sometimes|nullable|string',
            'description_seo' => 'sometimes|nullable|string|max:200',
            'categories' => 'sometimes|nullable|array',
            'categories.*' => 'required|numeric|gt:0',
            'qte' => 'required|numeric|gte:0',
            'price' => 'required|numeric|between:0000000000000.00,9999999999999.99',
            'old_price' => 'sometimes|nullable|numeric|between:0000000000000.00,9999999999999.99|gt:price',
            'image' => 'sometimes|nullable|file|image|max:5000',
        ];
    }
}
