@extends('layouts.app')

@section('title', 'Ajouter une salle')

@section('content')
    <h1>Ajouter une salle</h1>

    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror">
            @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Bâtiment</label>
            <input type="text" name="batiment" value="{{ old('batiment') }}" class="form-control @error('batiment') is-invalid @enderror">
            @error('batiment') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Capacité</label>
            <input type="number" name="capacite" value="{{ old('capacite') }}" class="form-control @error('capacite') is-invalid @enderror">
            @error('capacite') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
