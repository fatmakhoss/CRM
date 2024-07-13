@extends('layouts.base')
@section('content')
    <h1>Envoyer un SMS</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('twilioService.send') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="phone">Numéro de téléphone</label>
            <input type="text" name="phone" id="phone" class="form-control">
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control" rows="3"></textarea>
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
@endsection
