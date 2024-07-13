@extends('layouts.base')
@section('content')
<div class="container">
    <h1>Liste des Rendez-vous</h1>
    <a href="{{ route('rendez_vous.create') }}" class="btn btn-primary mb-3">Ajouter un Rendez-vous</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Date et Heure</th>
                <th>Lieu</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rendezVous as $rendezVous)
                <tr>
                    <td>{{ $rendezVous->id }}</td>
                    <td>{{ $rendezVous->client->name }}</td>
                    <td>{{ $rendezVous->date_rendez_vous }}</td>
                    <td>{{ $rendezVous->lieu }}</td>
                    <td>{{ $rendezVous->description }}</td>
                    <td>
                        <a href="{{ route('rendez_vous.show', $rendezVous->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('rendez_vous.edit', $rendezVous->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <!-- Ajoutez d'autres actions si nécessaire, comme la suppression -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


