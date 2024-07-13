@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Supprimer l'Interaction</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('interactions.destroy', $interaction->id) }}">
                            @csrf
                            @method('DELETE')

                            <div class="alert alert-danger" role="alert">
                                Êtes-vous sûr de vouloir supprimer cette interaction ?
                            </div>

                            <p><strong>Client :</strong> {{ $interactions->client->nom }}</p>
                            <p><strong>Type  :</strong> {{ $interactions->type }}</p>
                            <p><strong>Date  :</strong> {{ $interactions->date}}</p>
                            <p><strong>Description :</strong> {{ $interactions->description }}</p>

                            <button type="submit" class="btn btn-danger">Supprimer</button>
                            <a href="{{ route('interactions.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
