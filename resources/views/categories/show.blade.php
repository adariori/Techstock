@extends('layouts.app')

@section('title', $category->nom)

@section('content')
    <h1>Catégorie : {{ $category->nom }}</h1>

    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Modifier</a>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>

    <hr class="my-4">

    <h3>Équipements dans cette catégorie</h3>

    <table class="table table-striped">
        <thead>
            <tr><th>Nom</th><th>Marque</th><th>Salle</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse ($category->devices as $device)
                <tr>
                    <td>{{ $device->nom }}</td>
                    <td>{{ $device->marque }}</td>
                    <td>{{ $device->room->nom }}</td>
                    <td><a href="{{ route('devices.show', $device) }}" class="btn btn-sm btn-info">Voir</a></td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Aucun équipement dans cette catégorie.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
