<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreSurveyRequest extends FormRequest
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
            
            'client_id' => ['required', 'exists:clients,id'],

            'title' => ['required', 'string', 'max:255'],

            'description' => ['nullable', 'string'],

            'status' => ['required', 'in:draft,published,closed'],

            'questions' => ['required', 'array', 'min:1'],

            'questions.*.question' => ['required', 'string'],

            'questions.*.type' => [
                'required',
                'in:text,textarea,radio,checkbox,dropdown,rating'
            ],

            'questions.*.options' => [
                'nullable',
                'array'
            ],
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [

            'client_id.required' => 'Please select a client.',

            'client_id.exists' => 'Selected client is invalid.',

            'title.required' => 'Survey title is required.',

            'title.max' => 'Survey title may not be greater than 255 characters.',

            'status.required' => 'Please select a status.',

            'status.in' => 'Invalid survey status.',

            'questions.required' => 'Please add at least one question.',

            'questions.array' => 'Questions data is invalid.',

            'questions.min' => 'Please add at least one question.',

            'questions.*.question.required' => 'Question text is required.',

            'questions.*.type.required' => 'Question type is required.',

            'questions.*.type.in' => 'Invalid question type.',

        ];
    }
}
