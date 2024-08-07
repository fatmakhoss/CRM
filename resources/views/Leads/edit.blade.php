@extends('design.base')
@section('content')
    <div class="container">
                <div class="card">
                    <div class="card-header">Edit Lead</div>

                    <div class="card-body">
                        <form action="{{ route('leads.update', $lead->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="client_id">Client</label>
                                <select name="client_id" id="client_id" class="form-control">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" {{ $client->id == $lead->client_id ? 'selected' : '' }}>{{ $client->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="datetime-local" name="date" id="date" class="form-control" value="{{ $lead->date }}">
                            </div>

                            <div class="form-group">
                                <label for="lieu">Lieu</label>
                                <input type="text" name="lieu" id="lieu" class="form-control" value="{{ $lead->lieu }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="5" class="form-control">{{ $lead->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update </button>
                        </form>
                        
    </div>
@endsection
