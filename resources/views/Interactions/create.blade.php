@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer une nouvelle Interaction</div>
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

                        <form method="POST" action="{{ route('interactions.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="client_id">Client</label>
                                <select name="client_id" id="client_id" class="form-control" required>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="date">Date </label>
                                <input type="datetime-local" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="rappel">Date et Heure du Rappel</label>
                                <input type="datetime-local" name="rappel" id="rappel" class="form-control" value="{{ old('rappel') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Créer</button>
                            <a href="{{ route('interactions.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

