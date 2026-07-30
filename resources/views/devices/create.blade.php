@extends('layouts.app')

@section('title', 'Ajouter un équipement')

@section('content')
    <h1>Ajouter un équipement</h1>

    <form action="{{ route('devices.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror">
            @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Marque</label>
            <input type="text" name="marque" value="{{ old('marque') }}" class="form-control @error('marque') is-invalid @enderror">
            @error('marque') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Numéro de série</label>
            <input type="text" name="numero_serie" value="{{ old('numero_serie') }}" class="form-control @error('numero_serie') is-invalid @enderror">
            @error('numero_serie') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">État</label>
            <select name="etat" class="form-control @error('etat') is-invalid @enderror">
                <option value="">-- Choisir --</option>
                <option value="neuf" {{ old('etat') == 'neuf' ? 'selected' : '' }}>Neuf</option>
                <option value="bon" {{ old('etat') == 'bon' ? 'selected' : '' }}>Bon état</option>
                <option value="en panne" {{ old('etat') == 'en panne' ? 'selected' : '' }}>En panne</option>
            </select>
            @error('etat') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Date d'achat</label>
            <input type="date" name="date_achat" value="{{ old('date_achat') }}" class="form-control @error('date_achat') is-invalid @enderror">
            @error('date_achat') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Salle</label>
            <select name="room_id" class="form-control @error('room_id') is-invalid @enderror">
                <option value="">-- Choisir une salle --</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->nom }}</option>
                @endforeach
            </select>
            @error('room_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Catégories</label><br>
            @foreach ($categories as $category)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-check-input"
                        {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $category->nom }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('devices.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
