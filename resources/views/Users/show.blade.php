@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Détails de l'Utilisateur</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <p>{{ $users->id }}</p>
                    </div>

                    <div class="form-group">
                        <label for="nom_utilisateur">Nom utilisateur</label>
                        <p>{{ $users->nom_utilisateur }}</p>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <p>{{ $users->email }}</p>
                    </div>

                    <div class="form-group">
                        <label for="created_at">Date</label>
                        <p>{{ $users->created_at ? $users->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
                    </div>

                    <div class="form-group">
                        <label for="updated_at">Date de mise à jour</label>
                        <p>{{ $users->updated_at ? $users->updated_at->format('d/m/Y H:i') : 'N/A' }}</p>
                    </div>

                    <a href="{{ route('users.edit', $users->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('users.destroy', $users->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')">Supprimer</button>
                    </form>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
