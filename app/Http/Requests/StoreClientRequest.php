<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            
            'company_name' => 'required|string|max:255',

            'contact_person' => 'required|string|max:255',

            'email' => 'required|email|unique:clients,email',

            'phone' => 'required|max:20',

            'website' => 'nullable|url',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'address' => 'nullable',

            'status' => 'required|boolean',

        ];
    }
}
