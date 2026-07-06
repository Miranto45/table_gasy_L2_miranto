@extends('layout')
@section('content')
<h1>{{ $table->exists ? 'Modifier' : 'Nouvelle' }} table</h1>
<div class="card">
    <form method="POST" action="{{ $table->exists ? route('tables.update', $table) : route('tables.store') }}">
        @csrf
        @if($table->exists) @method('PUT') @endif
        <label>Zone</label>
        <select name="zone_id">
            @foreach($zones as $z)
                <option value="{{ $z->id }}" @selected($table->zone_id==$z->id)>{{ $z->nom }}</option>
            @endforeach
        </select>
        <label>Numéro</label><input name="numero" value="{{ old('numero', $table->numero) }}">
        <label>Capacité</label><input type="number" name="capacite" value="{{ old('capacite', $table->capacite ?? 2) }}">
        <label>Position X (%)</label><input type="number" name="pos_x" value="{{ old('pos_x', $table->pos_x ?? 20) }}">
        <label>Position Y (%)</label><input type="number" name="pos_y" value="{{ old('pos_y', $table->pos_y ?? 20) }}">
        <br><br><button class="btn">Enregistrer</button>
        <a href="{{ route('tables.index') }}" class="btn ghost">Annuler</a>
        @if($errors->any())<div style="color:red;margin-top:1rem">{{ implode(', ', $errors->all()) }}</div>@endif
    </form>
</div>
@endsection
