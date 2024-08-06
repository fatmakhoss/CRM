@extends('design.base')
@section('content')
<div class="container">
    <h1>Confirmer la suppression</h1>
    <p>Êtes-vous sûr de vouloir supprimer le client suivant ?</p>
    <p>Nom : {{ $client->nom }}</p>
    <p>Email : {{ $client->email }}</p>

    <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
