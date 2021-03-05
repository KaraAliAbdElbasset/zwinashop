<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'pic' => 'sometimes|nullable|file|image|max:5000',
        ];

        if ($this->method() === 'PUT')
        {
            $rules['password'] = 'sometimes|nullable|confirmed|min:8';
            $rules['email'] = 'required|string|email|unique:users,email,'.$this->route('user');
        }

        return $rules;
    }
}
