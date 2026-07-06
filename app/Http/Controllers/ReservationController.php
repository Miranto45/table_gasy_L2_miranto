<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reservations.index', [
            'reservations' => Reservation::with(['client', 'table'])->orderBy('date_reservation', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('reservations.form', [
            'reservation' => new Reservation(),
            'clients' => Client::all(),
            'tables' => Table::with('zone')->get(),
        ]);
    }

    public function store(Request $r)
    {
        Reservation::create($r->validate([
            'client_id' => 'required|exists:clients,id',
            'table_id' => 'required|exists:tables,id',
            'date_reservation' => 'required|date',
            'nb_personnes' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]));
        return redirect()->route('reservations.index')->with('ok', 'Réservation créée');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return back()->with('ok', 'Réservation supprimée');
    }
}
