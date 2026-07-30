<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeviceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $deviceId = $this->route('device')->id;

        return [
            'nom' => 'required|string|min:2|max:100',
            'marque' => 'required|string|min:2|max:100',
            'numero_serie' => 'required|string|unique:devices,numero_serie,' . $deviceId,
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
            'marque.required' => 'La marque est obligatoire.',
            'numero_serie.required' => 'Le numéro de série est obligatoire.',
            'numero_serie.unique' => 'Ce numéro de série existe déjà.',
            'etat.required' => 'L\'état est obligatoire.',
            'date_achat.required' => 'La date d\'achat est obligatoire.',
            'room_id.required' => 'Veuillez sélectionner une salle.',
        ];
    }
}
