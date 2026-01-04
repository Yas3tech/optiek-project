<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time_slot' => ['required', 'string', 'in:09:00,09:30,10:00,10:30,11:00,11:30,14:00,14:30,15:00,15:30,16:00,16:30,17:00'],
            'reason' => ['required', 'string', 'max:500'],
            'phone' => ['nullable', 'string', 'max:20'],
        ];
    }

    public function messages(): array
    {
        return [
            'date.required' => 'Kies een datum voor de afspraak.',
            'date.after_or_equal' => 'De datum mag niet in het verleden liggen.',
            'time_slot.required' => 'Kies een tijdslot.',
            'time_slot.in' => 'Kies een geldig tijdslot.',
            'reason.required' => 'Vul de reden van uw bezoek in.',
            'reason.max' => 'De reden mag maximaal 500 tekens bevatten.',
            'phone.max' => 'Het telefoonnummer mag maximaal 20 tekens bevatten.',
        ];
    }
}
