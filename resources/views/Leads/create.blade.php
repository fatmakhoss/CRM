@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">creatin nouvelle Lead</div>
                    
                    <div class="card-body">
                        <form action="{{ route('leads.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="client_id">client</label>
                                <select name="client_id" id="client_id" class="form-control" required>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="datetime-local" name="date" id="date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="lieu">Lieu</label>
                                <input type="text" name="lieu" id="lieu" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
