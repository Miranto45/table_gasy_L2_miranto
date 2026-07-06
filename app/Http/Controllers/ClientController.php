<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() { return view('clients.index', ['clients' => Client::latest()->get()]); }
    public function create() { return view('clients.form', ['client' => new Client()]); }

    public function store(Request $r)
    {
        Client::create($r->validate([
            'nom' => 'required|string', 'prenom' => 'required|string',
            'telephone' => 'nullable|string', 'email' => 'nullable|email',
        ]));
        return redirect()->route('clients.index')->with('ok', 'Client créé');
    }

    public function edit(Client $client) { return view('clients.form', ['client' => $client]); }

    public function update(Request $r, Client $client)
    {
        $client->update($r->validate([
            'nom' => 'required|string', 'prenom' => 'required|string',
            'telephone' => 'nullable|string', 'email' => 'nullable|email',
        ]));
        return redirect()->route('clients.index')->with('ok', 'Client modifié');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with('ok', 'Client supprimé');
    }
}
