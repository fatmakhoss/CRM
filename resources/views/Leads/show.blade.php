@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Lead Details</div>

            <div class="card-body">
                <div class="form-group">
                    <label for="client">Client</label>
                    <p>{{ $lead->client_id}}</p>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <p>{{ $lead->date }}</p>
                </div>

                <div class="form-group">
                    <label for="lieu">Lieu</label>
                    <p>{{ $lead->lieu }}</p>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <p>{{ $lead->description }}</p>
                </div>

                <a href="{{ route('leads.edit',$lead->id) }}" class="btn btn-primary">retour</a>
                <!-- Add a delete button if required -->
            </div>
        </div>
    </div>
@endsection
