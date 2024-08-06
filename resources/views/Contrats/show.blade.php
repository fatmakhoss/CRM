@extends('design.base')
@section('content')
    <h1>Détails du Contrat</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Numéro de Contrat : {{ $contrat->numero_contrat }}</h5>
            <p class="card-text">Client : {{ $contrat->client->name }}</p>
            <p class="card-text">Date de Début : {{ \Carbon\Carbon::parse($contrat->date_debut)->format('d/m/Y H:i') }}</p>
            <p class="card-text">Date de Fin : {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y H:i') }}</p>
            <p class="card-text">Détails du Contrat : {{ $contrat->details }}</p>
            <a href="{{ route('contrats.edit', $contrat->id) }}" class="btn btn-primary">Modifier</a>
            <form action="{{ route('contrats.destroy', $contrat->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat?')">Supprimer</button>
            </form>
            <a href="{{ route('contrats.index') }}" class="btn btn-secondary">Retour à la liste des Contrats</a>
            </div>
        </div>
    </div>
@endsection

