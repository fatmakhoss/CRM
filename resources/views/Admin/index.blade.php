@extends('design.base')
@section('content')
<div class="container">
    <div class="cols">
        <div class="col-md-6">
            <div class="card">
            <div class="card-header">settings</div>
            <div class="card-body">
                    <!-- Ajoutez ici des statistiques pertinentes pour l'administration -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">users</div>
                <div class="card-body">
                    <!-- Ajoutez ici des liens ou des boutons pour des actions rapides -->
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Gérer les Utilisateurs</a>
                    <!-- Ajoutez d'autres liens selon vos besoins -->

    </div>

@endsection

