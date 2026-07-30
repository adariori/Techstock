<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::withCount('devices')->get();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|min:2|max:100',
            'batiment' => 'required|string|min:1|max:100',
            'capacite' => 'required|integer|min:1',
        ]);

        Room::create($validated);

        return redirect()->route('rooms.index')->with('success', 'Salle créée avec succès.');
    }

    public function show(Room $room)
    {
        $room->load('devices');
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'nom' => 'required|string|min:2|max:100',
            'batiment' => 'required|string|min:1|max:100',
            'capacite' => 'required|integer|min:1',
        ]);

        $room->update($validated);

        return redirect()->route('rooms.index')->with('success', 'Salle modifiée avec succès.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Salle supprimée avec succès.');
    }
}
