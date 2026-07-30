<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function store(Request $request, Device $device)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'type' => 'required|string',
            'commentaire' => 'nullable|string|max:500',
        ]);

        $device->interventions()->create($validated);

        return redirect()->route('devices.show', $device)->with('success', 'Intervention ajoutée avec succès.');
    }
}
