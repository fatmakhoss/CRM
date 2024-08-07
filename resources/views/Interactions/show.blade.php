@extends('design.base')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Détails de l'interaction</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="client">Client</label>
                            <input type="text" id="client" class="form-control" value="{{ $interactions->client->nom }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="type_interaction">Type d'Interaction</label>
                            <input type="text" id="type_interaction" class="form-control" value="{{ $interactions->type_interaction }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="date_interaction">Date d'Interaction</label>
                            <input type="text" id="date_interaction" class="form-control" value="{{ $interactions->date_interaction }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="rappel">Rappel</label>
                            <input type="text" id="rappel" class="form-control" value="{{ $interactions->rappel }}" disabled>
                        </div>

                        <a href="{{ route('interactions.index') }}" class="btn btn-secondary">Retour</a>


    </div>
    @endsection
