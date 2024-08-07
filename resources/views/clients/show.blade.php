@extends('design.base')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Détails du client</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" class="form-control" value="{{ $clients->nom }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" id="adresse" class="form-control" value="{{ $clients->adresse }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="telephone"> Téléphone</label>
                            <input type="text" id="telephone" class="form-control" value="{{ $clients->telephone }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" value="{{ $clients->email }}"disabled >
                        </div>

                        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour</a>
                    
    </div>
    @endsection
