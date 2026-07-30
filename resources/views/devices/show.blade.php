@extends('layouts.app')

@section('title', $device->nom)

@section('content')
    <h1>{{ $device->nom }}</h1>

    <table class="table table-bordered w-50">
        <tr>
            <th>Marque</th>
            <td>{{ $device->marque }}</td>
        </tr>
        <tr>
            <th>N° série</th>
            <td>{{ $device->numero_serie }}</td>
        </tr>
        <tr>
            <th>État</th>
            <td>
                @if($device->etat === 'neuf')
                    <span class="badge bg-success">Neuf</span>
                @elseif($device->etat === 'bon')
                    <span class="badge bg-primary">Bon</span>
                @else
                    <span class="badge bg-danger">En panne</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Date d'achat</th>
            <td>{{ $device->date_achat }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $device->description }}</td>
        </tr>
        <tr>
            <th>Salle</th>
            <td>{{ $device->room->nom }}</td>
        </tr>
        <tr>
            <th>Catégories</th>
            <td>
                @forelse ($device->categories as $category)
                    <span class="badge bg-secondary">{{ $category->nom }}</span>
                @empty
                    <em>Aucune catégorie</em>
                @endforelse
            </td>
        </tr>
    </table>

    <a href="{{ route('devices.edit', $device) }}" class="btn btn-warning">Modifier</a>
    <a href="{{ route('devices.index') }}" class="btn btn-secondary">Retour</a>

    <hr class="my-4">

    <h3>Historique des interventions</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Commentaire</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($device->interventions as $intervention)
                <tr>
                    <td>{{ $intervention->date }}</td>
                    <td>{{ $intervention->type }}</td>
                    <td>{{ $intervention->commentaire }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Aucune intervention enregistrée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h4>Ajouter une intervention</h4>
    <form action="{{ route('interventions.store', $device) }}" method="POST">
        @csrf
        <div class="row g-2 align-items-end">
            <div class="col-auto">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="col-auto">
                <label class="form-label">Type</label>
                <select name="type" class="form-control">
                    <option value="maintenance">Maintenance</option>
                    <option value="panne">Panne</option>
                    <option value="reparation">Réparation</option>
                </select>
            </div>
            <div class="col-auto">
                <label class="form-label">Commentaire</label>
                <input type="text" name="commentaire" class="form-control">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </form>
@endsection
