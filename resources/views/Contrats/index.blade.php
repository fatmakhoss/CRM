@extends('layouts.base')
@section('content')
<div class="container">
    <h1>Liste des Contrats</h1>
    <a href="{{ route('contrats.create') }}" class="btn btn-primary mb-3">Ajouter un Contrat</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Numéro de Contrat</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contratscount as $contrat)
                <tr>
                    <td>{{ $contrat->id }}</td>
                    <td>{{ $contrat->client->name }}</td>
                    <td>{{ $contrat->numero_contrat }}</td>
                    <td>{{ $contrat->date_debut }}</td>
                    <td>{{ $contrat->date_fin }}</td>
                    <td>
                        <a href="{{ route('contrats.show', $contrat->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('contrats.edit', $contrat->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('contrats.destroy', $contrat->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

