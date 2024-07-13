@extends('layouts.base')
@section('content')
<div class="container">
    <h1>Modifier le Contrat</h1>
    <form action="{{ route('contrats.update', $contrat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="client_id">Client</label>
            <select name="client_id" id="client_id" class="form-control">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $contrat->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="numero_contrat">Numéro de Contrat</label>
            <input type="text" name="numero_contrat" id="numero_contrat" class="form-control" value="{{ $contrat->numero_contrat }}" required>
        </div>

        <div class="form-group">
            <label for="date_debut">Date de Début</label>
            <input type="datetime-local" name="date_debut" id="date_debut" class="form-control" value="{{ \Carbon\Carbon::parse($contrat->date_debut)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <label for="date_fin">Date de Fin</label>
            <input type="datetime-local" name="date_fin" id="date_fin" class="form-control" value="{{ \Carbon\Carbon::parse($contrat->date_fin)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <label for="details">Détails du Contrat</label>
            <textarea name="details" id="details" class="form-control" rows="3">{{ $contrat->details }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les Modifications</button>
        <a href="{{ route('contrats.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
