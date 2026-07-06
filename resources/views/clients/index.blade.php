@extends('layout')
@section('content')
<h1>Clients</h1>
<div class="card"><a href="{{ route('clients.create') }}" class="btn">+ Nouveau client</a></div>
<div class="card">
    <table>
        <tr><th>Nom</th><th>Prénom</th><th>Téléphone</th><th>Email</th><th>Actions</th></tr>
        @foreach($clients as $c)
        <tr>
            <td>{{ $c->nom }}</td><td>{{ $c->prenom }}</td>
            <td>{{ $c->telephone }}</td><td>{{ $c->email }}</td>
            <td>
                <a href="{{ route('clients.edit', $c) }}" class="btn ghost">Modifier</a>
                <form method="POST" action="{{ route('clients.destroy', $c) }}" class="inline" onsubmit="return confirm('Supprimer ?')">
                    @csrf @method('DELETE')
                    <button class="btn danger">X</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
