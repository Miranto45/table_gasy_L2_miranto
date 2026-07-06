@extends('layout')
@section('content')
<h1>Plan des tables</h1>

<div class="card">
    <form method="GET" style="display:grid;grid-template-columns:1fr 1fr auto auto;gap:1rem;align-items:end">
        <div>
            <label>Zone</label>
            <select name="zone_id">
                <option value="">Toutes</option>
                @foreach($zones as $z)
                    <option value="{{ $z->id }}" @selected(($filters['zone_id'] ?? '') == $z->id)>{{ $z->nom }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Capacité minimum</label>
            <input type="number" name="capacite_min" value="{{ $filters['capacite_min'] ?? '' }}" min="1">
        </div>
        <button class="btn">Filtrer</button>
        <a href="{{ route('tables.create') }}" class="btn">+ Nouvelle table</a>
    </form>
</div>

<div class="card legend">
    <span class="s-libre">Libre</span>
    <span class="s-reservee">Réservée</span>
    <span class="s-occupee">Occupée</span>
    <span class="s-a_nettoyer">À nettoyer</span>
    <span class="s-hors_service">Hors service</span>
</div>

<div class="card">
    <div class="plan">
        @foreach($tables as $t)
            <div class="table-item s-{{ $t->statut }}" style="left:{{ $t->pos_x }}%;top:{{ $t->pos_y }}%"
                 title="Table {{ $t->numero }} - {{ $t->capacite }} pers. - {{ $t->zone->nom }}">
                <div>{{ $t->numero }}</div>
                <div style="font-size:0.65rem">{{ $t->capacite }}p</div>
            </div>
        @endforeach
    </div>
</div>

<div class="card">
    <h2>Liste</h2>
    <table>
        <tr><th>Numéro</th><th>Zone</th><th>Capacité</th><th>Statut</th><th>Actions</th></tr>
        @foreach($tables as $t)
        <tr>
            <td>{{ $t->numero }}</td>
            <td>{{ $t->zone->nom }}</td>
            <td>{{ $t->capacite }}</td>
            <td>
                <form method="POST" action="{{ route('tables.statut', $t) }}" class="inline">
                    @csrf
                    <select name="statut" onchange="this.form.submit()">
                        @foreach(['libre','reservee','occupee','a_nettoyer','hors_service'] as $s)
                            <option value="{{ $s }}" @selected($t->statut==$s)>{{ $s }}</option>
                        @endforeach
                    </select>
                </form>
            </td>
            <td>
                <a href="{{ route('tables.edit', $t) }}" class="btn ghost">Modifier</a>
                <form method="POST" action="{{ route('tables.destroy', $t) }}" class="inline" onsubmit="return confirm('Supprimer ?')">
                    @csrf @method('DELETE')
                    <button class="btn danger">X</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
