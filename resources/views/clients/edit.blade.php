@extends('design.base')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier le client</div>
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

                        <form action="{{ route('clients.update', $clients->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $clients->nom) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="prenom">prenom</label>
                                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom', $clients->prenom) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $clients->adresse) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone', $clients->telephone) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $clients->email) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            <a href="{{ route('clients.index')}}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection



