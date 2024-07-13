@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer un nouveau client</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="prenom">prenom</label>
                                <input type="text" name="prenom" id="nom" class="form-control" value="{{ old('prenom') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Créer</button>
                            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection


