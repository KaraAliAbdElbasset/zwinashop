<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $rules =  [
            'name' => 'required|string|max:100|unique:brands,name',
            'image' => 'sometimes|nullable|file|image|max:5000',
            'description' => 'sometimes|nullable|string|max:200',
        ];

        if ($this->method() === 'PUT')
        {
            $rules['name'] = 'required|string|max:100|unique:brands,name,'.$this->route('brand');
        }
        return $rules;
    }
}
