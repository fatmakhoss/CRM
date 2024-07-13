@extends('layouts.base')
@section('content')
<div class="container">
    <h1>Ajouter un Contrat</h1>
    <form action="{{ route('contrats.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="client_id">Client</label>
            <select name="client_id" id="client_id" class="form-control">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="numero_contrat">Numéro de Contrat</label>
            <input type="text" name="numero_contrat" id="numero_contrat" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_debut">Date de Début</label>
            <input type="datetime-local" name="date_debut" id="date_debut" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_fin">Date de Fin</label>
            <input type="datetime-local" name="date_fin" id="date_fin" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="details">Détails du Contrat</label>
            <textarea name="details" id="details" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('contrats.index') }}" class="btn btn-secondary">Retour à la liste des Contrats</a>
    </form>
</div>
@endsection

