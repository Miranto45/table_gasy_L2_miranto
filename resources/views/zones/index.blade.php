@extends('layout')
@section('content')
<h1>Zones</h1>
<div class="card">
    <a href="{{ route('zones.create') }}" class="btn">+ Nouvelle zone</a>
</div>
<div class="card">
    <table>
        <tr><th>Nom</th><th>Description</th><th>Tables</th><th>Actions</th></tr>
        @foreach($zones as $z)
        <tr>
            <td>{{ $z->nom }}</td>
            <td>{{ $z->description }}</td>
            <td>{{ $z->tables_count }}</td>
            <td>
                <a href="{{ route('zones.edit', $z) }}" class="btn ghost">Modifier</a>
                <form method="POST" action="{{ route('zones.destroy', $z) }}" class="inline" onsubmit="return confirm('Supprimer ?')">
                    @csrf @method('DELETE')
                    <button class="btn danger">X</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
