<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index() { return view('zones.index', ['zones' => Zone::withCount('tables')->get()]); }
    public function create() { return view('zones.form', ['zone' => new Zone()]); }

    public function store(Request $r)
    {
        Zone::create($r->validate(['nom' => 'required|string', 'description' => 'nullable|string']));
        return redirect()->route('zones.index')->with('ok', 'Zone créée');
    }

    public function edit(Zone $zone) { return view('zones.form', ['zone' => $zone]); }

    public function update(Request $r, Zone $zone)
    {
        $zone->update($r->validate(['nom' => 'required|string', 'description' => 'nullable|string']));
        return redirect()->route('zones.index')->with('ok', 'Zone modifiée');
    }

    public function destroy(Zone $zone)
    {
        $zone->delete();
        return back()->with('ok', 'Zone supprimée');
    }
}
