@extends('layouts.app')

@section('title', 'Équipements')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Équipements</h1>
        <a href="{{ route('devices.create') }}" class="btn btn-primary">Ajouter un équipement</a>
    </div>

    <form method="GET" action="{{ route('devices.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control"
                placeholder="Rechercher par nom ou marque...">
            <button type="submit" class="btn btn-outline-primary">Rechercher</button>
            @if($search ?? false)
                <a href="{{ route('devices.index') }}" class="btn btn-outline-secondary">Réinitialiser</a>
            @endif
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Marque</th>
                <th>N° série</th>
                <th>État</th>
                <th>Salle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($devices as $device)
                <tr>
                    <td>{{ $device->nom }}</td>
                    <td>{{ $device->marque }}</td>
                    <td>{{ $device->numero_serie }}</td>
                    <td>
                        @if($device->etat === 'neuf')
                            <span class="badge bg-success">Neuf</span>
                        @elseif($device->etat === 'bon')
                            <span class="badge bg-primary">Bon</span>
                        @else
                            <span class="badge bg-danger">En panne</span>
                        @endif
                    </td>
                    <td>{{ $device->room->nom }}</td>
                    <td>
                        <a href="{{ route('devices.show', $device) }}" class="btn btn-sm btn-info">Voir</a>
                        <a href="{{ route('devices.edit', $device) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('devices.destroy', $device) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Supprimer cet équipement ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Aucun équipement pour le moment.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($devices->hasPages())
    <div class="d-flex justify-content-center">
        <ul class="pagination">
            @foreach ($devices->appends(['search' => $search])->getUrlRange(1, $devices->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $devices->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
