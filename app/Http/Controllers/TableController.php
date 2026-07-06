<?php

namespace App\Http\Controllers;

use App\Models\HistoriqueStatutTable;
use App\Models\Table;
use App\Models\Zone;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index(Request $r)
    {
        $q = Table::with('zone');
        if ($r->zone_id) $q->where('zone_id', $r->zone_id);
        if ($r->capacite_min) $q->where('capacite', '>=', $r->capacite_min);
        return view('tables.index', [
            'tables' => $q->get(),
            'zones' => Zone::all(),
            'filters' => $r->only(['zone_id', 'capacite_min']),
        ]);
    }

    public function create() { return view('tables.form', ['table' => new Table(), 'zones' => Zone::all()]); }

    public function store(Request $r)
    {
        $data = $r->validate([
            'zone_id' => 'required|exists:zones,id',
            'numero' => 'required|string',
            'capacite' => 'required|integer|min:1',
            'pos_x' => 'required|integer',
            'pos_y' => 'required|integer',
        ]);
        Table::create($data);
        return redirect()->route('tables.index')->with('ok', 'Table créée');
    }

    public function edit(Table $table) { return view('tables.form', ['table' => $table, 'zones' => Zone::all()]); }

    public function update(Request $r, Table $table)
    {
        $data = $r->validate([
            'zone_id' => 'required|exists:zones,id',
            'numero' => 'required|string',
            'capacite' => 'required|integer|min:1',
            'pos_x' => 'required|integer',
            'pos_y' => 'required|integer',
        ]);
        $table->update($data);
        return redirect()->route('tables.index')->with('ok', 'Table modifiée');
    }

    public function destroy(Table $table)
    {
        $table->delete();
        return back()->with('ok', 'Table supprimée');
    }

    public function changeStatut(Request $r, Table $table)
    {
        $data = $r->validate(['statut' => 'required|in:libre,reservee,occupee,a_nettoyer,hors_service']);
        HistoriqueStatutTable::create([
            'table_id' => $table->id,
            'ancien_statut' => $table->statut,
            'nouveau_statut' => $data['statut'],
        ]);
        $table->update(['statut' => $data['statut']]);
        return back()->with('ok', 'Statut mis à jour');
    }
}
