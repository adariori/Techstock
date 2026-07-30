@extends('layouts.app')

@section('title', $room->nom)

@section('content')
    <h1>{{ $room->nom }}</h1>
    <p><strong>Bâtiment :</strong> {{ $room->batiment }} — <strong>Capacité :</strong> {{ $room->capacite }}</p>

    <a href="{{ route('rooms.edit', $room) }}" class="btn btn-warning">Modifier</a>
    <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Retour</a>

    <hr class="my-4">

    <h3>Équipements dans cette salle</h3>

    <table class="table table-striped">
        <thead>
            <tr><th>Nom</th><th>Marque</th><th>État</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse ($room->devices as $device)
                <tr>
                    <td>{{ $device->nom }}</td>
                    <td>{{ $device->marque }}</td>
                    <td>{{ $device->etat }}</td>
                    <td><a href="{{ route('devices.show', $device) }}" class="btn btn-sm btn-info">Voir</a></td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Aucun équipement dans cette salle.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
