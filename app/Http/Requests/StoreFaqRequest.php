<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
            'position' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'faq_category_id.required' => 'Selecteer een categorie.',
            'faq_category_id.exists' => 'De geselecteerde categorie bestaat niet.',
            'question.required' => 'De vraag is verplicht.',
            'answer.required' => 'Het antwoord is verplicht.',
        ];
    }
}
