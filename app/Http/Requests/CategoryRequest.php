<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
    public function rules()
    {
        $rules =  [
            'name' => 'required|string|max:100|unique:categories,name',
            'category_id' => 'required|numeric|gte:0',
            'image' => 'sometimes|nullable|file|image|max:5000',
            'description' => 'sometimes|nullable|string|max:200',
            'featured' => 'sometimes|nullable',
        ];

        if ($this->method() === 'PUT')
        {
            $rules['name'] = 'required|string|max:100|unique:categories,name,'.$this->route('category');
        }
        return $rules;
    }
}
