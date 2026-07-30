@extends('layouts.app')

@section('title', 'Modifier la salle')

@section('content')
    <h1>Modifier {{ $room->nom }}</h1>

    <form action="{{ route('rooms.update', $room) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" value="{{ old('nom', $room->nom) }}" class="form-control @error('nom') is-invalid @enderror">
            @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Bâtiment</label>
            <input type="text" name="batiment" value="{{ old('batiment', $room->batiment) }}" class="form-control @error('batiment') is-invalid @enderror">
            @error('batiment') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Capacité</label>
            <input type="number" name="capacite" value="{{ old('capacite', $room->capacite) }}" class="form-control @error('capacite') is-invalid @enderror">
            @error('capacite') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
