@extends('layout')
@section('content')
<h1>{{ $zone->exists ? 'Modifier' : 'Nouvelle' }} zone</h1>
<div class="card">
    <form method="POST" action="{{ $zone->exists ? route('zones.update', $zone) : route('zones.store') }}">
        @csrf
        @if($zone->exists) @method('PUT') @endif
        <label>Nom</label><input name="nom" value="{{ old('nom', $zone->nom) }}">
        <label>Description</label><input name="description" value="{{ old('description', $zone->description) }}">
        <br><br><button class="btn">Enregistrer</button>
        <a href="{{ route('zones.index') }}" class="btn ghost">Annuler</a>
    </form>
</div>
@endsection
