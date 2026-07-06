@extends('layout')
@section('content')
<h1>{{ $client->exists ? 'Modifier' : 'Nouveau' }} client</h1>
<div class="card">
    <form method="POST" action="{{ $client->exists ? route('clients.update', $client) : route('clients.store') }}">
        @csrf
        @if($client->exists) @method('PUT') @endif
        <label>Nom</label><input name="nom" value="{{ old('nom', $client->nom) }}">
        <label>Prénom</label><input name="prenom" value="{{ old('prenom', $client->prenom) }}">
        <label>Téléphone</label><input name="telephone" value="{{ old('telephone', $client->telephone) }}">
        <label>Email</label><input name="email" type="email" value="{{ old('email', $client->email) }}">
        <br><br><button class="btn">Enregistrer</button>
        <a href="{{ route('clients.index') }}" class="btn ghost">Annuler</a>
    </form>
</div>
@endsection
