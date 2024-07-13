{{-- @extends('layouts.base')
@section('content') --}}
@extends('design.navbar')
@extends('design.footer')
@extends('design.header')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Leads</div>
            <div class="card-body">
                <a href="{{ route('leads.create') }}" class="btn btn-primary mb-3">Create</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Lieu</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leadsCount as $lead)
                            <tr>
                                <td>{{ $lead->id }}</td>
                                <td>{{ $lead->client->nom }}</td>
                                <td>{{ $lead->date }}</td>
                                <td>{{ $lead->lieu }}</td>
                                <td>{{ $lead->description }}</td>
                                <td>
                                    <a href="{{ route('leads.show', $lead->id) }}" class="btn btn-info">show</a>
                                    <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection



