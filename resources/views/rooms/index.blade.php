@extends('layouts.app')

@section('title', 'Salles')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Salles</h1>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">Ajouter une salle</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Bâtiment</th>
                <th>Capacité</th>
                <th>Nb équipements</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rooms as $room)
                <tr>
                    <td>{{ $room->nom }}</td>
                    <td>{{ $room->batiment }}</td>
                    <td>{{ $room->capacite }}</td>
                    <td>{{ $room->devices_count }}</td>
                    <td>
                        <a href="{{ route('rooms.show', $room) }}" class="btn btn-sm btn-info">Voir</a>
                        <a href="{{ route('rooms.edit', $room) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette salle ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Aucune salle pour le moment.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
