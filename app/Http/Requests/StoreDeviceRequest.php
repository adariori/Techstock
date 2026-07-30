<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeviceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|min:2|max:100',
            'marque' => 'required|string|min:2|max:100',
            'numero_serie' => 'required|string|unique:devices,numero_serie',
            'etat' => 'required|string',
            'date_achat' => 'required|date',
            'description' => 'nullable|string|max:1000',
            'room_id' => 'required|exists:rooms,id',
            'categories' => 'nullable|array',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.min' => 'Le nom doit contenir au moins 2 caractères.',
            'marque.required' => 'La marque est obligatoire.',
            'numero_serie.required' => 'Le numéro de série est obligatoire.',
            'numero_serie.unique' => 'Ce numéro de série existe déjà.',
            'etat.required' => 'L\'état est obligatoire.',
            'date_achat.required' => 'La date d\'achat est obligatoire.',
            'date_achat.date' => 'La date d\'achat doit être une date valide.',
            'room_id.required' => 'Veuillez sélectionner une salle.',
            'room_id.exists' => 'La salle sélectionnée n\'existe pas.',
        ];
    }
}
