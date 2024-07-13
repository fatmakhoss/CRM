@extends('layouts.base')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Créer un nouvel Utilisateur</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nom_utilisateur">Nom d'utilisateur</label>
                            <input type="text" name="nom_utilisateur" id="nom_utilisateur" class="form-control @error('nom_utilisateur') is-invalid @enderror" value="{{ old('nom_utilisateur') }}" required>
                            @error('nom_utilisateur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mot_de_passe">Mot de passe</label>
                            <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control @error('mot_de_passe') is-invalid @enderror" required>
                            @error('mot_de_passe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Créer Utilisateur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

