@extends('layout')
@section('content')
<h1>Réservations</h1>
<div class="card"><a href="{{ route('reservations.create') }}" class="btn">+ Nouvelle réservation</a></div>
<div class="card">
    <table>
        <tr><th>Date</th><th>Client</th><th>Table</th><th>Personnes</th><th>Notes</th><th></th></tr>
        @foreach($reservations as $r)
        <tr>
            <td>{{ $r->date_reservation->format('d/m/Y H:i') }}</td>
            <td>{{ $r->client->prenom }} {{ $r->client->nom }}</td>
            <td>{{ $r->table->numero }}</td>
            <td>{{ $r->nb_personnes }}</td>
            <td>{{ $r->notes }}</td>
            <td>
                <form method="POST" action="{{ route('reservations.destroy', $r) }}" class="inline" onsubmit="return confirm('Supprimer ?')">
                    @csrf @method('DELETE')
                    <button class="btn danger">X</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
