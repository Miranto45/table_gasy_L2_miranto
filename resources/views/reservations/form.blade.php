@extends('layout')
@section('content')
<h1>Nouvelle réservation</h1>
<div class="card">
    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf
        <label>Client</label>
        <select name="client_id">
            @foreach($clients as $c)<option value="{{ $c->id }}">{{ $c->prenom }} {{ $c->nom }}</option>@endforeach
        </select>
        <label>Table</label>
        <select name="table_id">
            @foreach($tables as $t)<option value="{{ $t->id }}">{{ $t->numero }} ({{ $t->zone->nom }}, {{ $t->capacite }}p)</option>@endforeach
        </select>
        <label>Date & heure</label>
        <input type="datetime-local" name="date_reservation" value="{{ now()->format('Y-m-d\TH:i') }}">
        <label>Nombre de personnes</label>
        <input type="number" name="nb_personnes" value="2" min="1">
        <label>Notes</label>
        <textarea name="notes"></textarea>
        <br><br><button class="btn">Enregistrer</button>
        <a href="{{ route('reservations.index') }}" class="btn ghost">Annuler</a>
    </form>
</div>
@endsection
