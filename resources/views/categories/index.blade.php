@extends('layouts.app')

@section('title', 'Catégories')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Catégories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Ajouter une catégorie</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr><th>Nom</th><th>Nb équipements</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->nom }}</td>
                    <td>{{ $category->devices_count }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-info">Voir</a>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette catégorie ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center">Aucune catégorie pour le moment.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
