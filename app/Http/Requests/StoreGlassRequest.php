<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGlassRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'max:2048'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht.',
            'brand.required' => 'Het merk is verplicht.',
            'price.required' => 'De prijs is verplicht.',
            'price.numeric' => 'De prijs moet een getal zijn.',
            'stock.required' => 'De voorraad is verplicht.',
            'stock.integer' => 'De voorraad moet een geheel getal zijn.',
            'image.image' => 'Het bestand moet een afbeelding zijn.',
            'image.max' => 'De afbeelding mag maximaal 2MB zijn.',
        ];
    }
}
