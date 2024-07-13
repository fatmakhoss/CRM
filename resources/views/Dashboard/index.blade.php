{{-- @extends('layouts.base')
@section('content') --}}
@extends('design.navbar')
@extends('design.footer')
@extends('design.header')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nombre de Leads</h5>
                        <p class="card-text">{{ $leadsCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nombre d'Interactions</h5>
                        <p class="card-text">{{ $interactionsCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nombre de Contrats</h5>
                        <p class="card-text">{{ $contratsCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nombre de clients</h5>
                        <p class="card-text">{{ $clientsCount }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>


