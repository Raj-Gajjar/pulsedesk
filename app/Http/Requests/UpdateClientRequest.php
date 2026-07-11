<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Override;

class UpdateClientRequest extends FormRequest
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

            'company_name' => ['required', 'string', 'max:255'],

            'contact_person' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                Rule::unique('clients', 'email')->ignore($this->client),
            ],

            'phone' => ['required', 'max:20'],

            'website' => ['nullable', 'url'],

            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],

            'address' => ['nullable', 'string'],

            'status' => ['required', 'boolean'],

        ];
    }

    #[Override]
    public function messages(): array
    {
        return [

            'company_name.required' => 'Company name is required.',

            'contact_person.required' => 'Contact person is required.',

            'email.required' => 'Email is required.',

            'email.email' => 'Please enter a valid email address.',

            'email.unique' => 'This email already exists.',

            'phone.required' => 'Phone number is required.',

            'phone.unique' => 'This phone number already exists.',

            'website.url' => 'Please enter a valid website URL.',

            'logo.image' => 'Logo must be an image.',

            'logo.mimes' => 'Logo must be a JPG, JPEG, PNG or WEBP image.',

            'logo.max' => 'Logo size must not exceed 2 MB.',

            'status.required' => 'Please select a status.',

        ];
    }

}
