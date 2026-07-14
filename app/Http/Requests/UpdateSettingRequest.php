<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'app_name' => [
                'required',
                'string',
                'max:255',
            ],

            'company_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'timezone' => [
                'required',
                'string',
                'max:255',
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,svg',
                'max:5048',
            ],

            'favicon' => [
                'nullable',
                'image',
                'mimes:ico,png',
                'max:1024',
            ],

            'survey_default_status' => [
                'required',
                'in:draft,published',
            ],

            'allow_multiple_response' => [
                'nullable',
                'boolean',
            ],
        ];
    }

    public function messages(): array
    {
        return [

            'app_name.required' => 'Application name is required.',

            'timezone.required' => 'Timezone is required.',

            'survey_default_status.required' => 'Please select the default survey status.',

            'logo.image' => 'Logo must be an image.',

            'favicon.image' => 'Favicon must be an image.',

        ];
    }

}
