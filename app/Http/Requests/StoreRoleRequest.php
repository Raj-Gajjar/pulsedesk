<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => ['required', 'string', 'max:255', 'unique:roles,name'],

            'permissions' => ['required', 'array'],

            'permissions.*' => ['exists:permissions,name'],

        ];
    }

    public function messages(): array
    {
        return [

            'name.required' => 'Role name is required.',

            'name.unique' => 'This role already exists.',

            'permissions.required' => 'Please select at least one permission.',

        ];
    }
    
}
