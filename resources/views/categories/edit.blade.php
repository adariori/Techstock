@extends('layouts.app')

@section('title', 'Modifier la catégorie')

@section('content')
    <h1>Modifier {{ $category->nom }}</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" value="{{ old('nom', $category->nom) }}" class="form-control @error('nom') is-invalid @enderror">
            @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
