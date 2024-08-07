@extends('design.base')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier l'Interaction</div>
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

                        <form method="POST" action="{{ route('interactions.update', $interaction->id) }}">
                            @csrf
                            @method('PUT')

        <div class="form-group">
            <label for="type">Type </label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $interaction->type}}">
            <input type="text" class="form-control d-none" id="client_id" name="client_id" value="{{ $interaction->client->id}}">

        </div>
                            <div class="form-group">
                                <label for="date">Date </label>
                                <input type="date-local" name="date" id="date" class="form-control" value="{{ old('date', $interaction->date) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $interaction->description) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="rappel"> Rappel</label>
                                <input type="date-local" name="rappel" id="rappel" class="form-control" value="{{ old('rappel', $interaction->rappel) }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            <a href="{{ route('interactions.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>

    </div>
@endsection

