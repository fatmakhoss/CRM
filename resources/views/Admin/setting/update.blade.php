@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Éditer les Paramètres Administrateur</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('admin.users.usersupdate';$users->id) }}">
        @csrf
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('admin.users.usersupdate') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
