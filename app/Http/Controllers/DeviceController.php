<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Room;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;

class DeviceController extends Controller
{
public function index(Request $request)
    {
        $search = $request->input('search');

        $devices = Device::with('room')
            ->when($search, function ($query, $search) {
                $query->where('nom', 'like', "%{$search}%")
                    ->orWhere('marque', 'like', "%{$search}%");
            })
            ->orderBy('nom')
            ->paginate(5);

        return view('devices.index', compact('devices', 'search'));
    }
    public function create()
    {
        $rooms = Room::all();
        $categories = Category::all();
        return view('devices.create', compact('rooms', 'categories'));
    }

    public function store(StoreDeviceRequest $request)
    {
        $device = Device::create($request->validated());
        $device->categories()->sync($request->input('categories', []));

        return redirect()->route('devices.index')->with('success', 'Équipement créé avec succès.');
    }

    public function show(Device $device)
    {
        $device->load('room', 'categories', 'interventions');
        return view('devices.show', compact('device'));
    }

    public function edit(Device $device)
    {
        $rooms = Room::all();
        $categories = Category::all();
        $device->load('categories');
        return view('devices.edit', compact('device', 'rooms', 'categories'));
    }

    public function update(UpdateDeviceRequest $request, Device $device)
    {
        $device->update($request->validated());
        $device->categories()->sync($request->input('categories', []));

        return redirect()->route('devices.index')->with('success', 'Équipement modifié avec succès.');
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route('devices.index')->with('success', 'Équipement supprimé avec succès.');
    }
}
