@extends('layouts.base')
@section('content')
<div class="container">
    <h1>Supprimer l'utilisateur</h1>
    <p>Êtes-vous sûr de vouloir supprimer cet utilisateur : <strong>{{ $users->nom_utilisateur }}</strong> ?</p>
    <form action="{{ route('users.destroy', $users->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Confirmer la Suppression</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
