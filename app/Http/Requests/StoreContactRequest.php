<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vul uw naam in.',
            'name.max' => 'Uw naam mag maximaal 255 tekens bevatten.',
            'email.required' => 'Vul uw e-mailadres in.',
            'email.email' => 'Vul een geldig e-mailadres in.',
            'phone.max' => 'Het telefoonnummer mag maximaal 20 tekens bevatten.',
            'subject.required' => 'Vul een onderwerp in.',
            'subject.max' => 'Het onderwerp mag maximaal 255 tekens bevatten.',
            'message.required' => 'Vul uw bericht in.',
            'message.min' => 'Uw bericht moet minimaal 10 tekens bevatten.',
            'message.max' => 'Uw bericht mag maximaal 5000 tekens bevatten.',
        ];
    }
}
