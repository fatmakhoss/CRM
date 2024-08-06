@extends('layouts.base')
@section('content')

    <h1>Modifier l'Utilisateur</h1>

    <form action="{{ route('admin.users.update', ['id' => $user->id]) }}"  method="POST">
        @csrf
        @method('PUT')  {{-- Utilisation de PUT pour la méthode de mise à jour --}}

        <div class="form-group">
            <label for="nom_utilisateur">Nom utilisateur</label>
            <input type="text" name="nom_utilisateur" id="nom_utilisateur" class="form-control" value="{{ old('nom_utilisateur', $user->nom_utilisateur) }}">
            @error('nom_utilisateur')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Ajoutez d'autres champs pour les modifications nécessaires -->

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Retour</a>
    </form>
@endsection
