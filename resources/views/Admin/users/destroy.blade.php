@extends('layouts.base')
@section('content')
    <div class="container">
        <h1>Supprimer l'utilisateur</h1>

        <div class="alert alert-danger">
            <strong>Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.</strong>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom utilisateur</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $users->id }}</td>
                    <td>{{ $users->nom_utilisateur}}</td>
                    <td>{{ $users->email }}</td>
                </tr>
            </tbody>
        </table>

        <form method="POST" action="{{ route('admin.users.destroy', $users->id) }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Oui, supprimer</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
