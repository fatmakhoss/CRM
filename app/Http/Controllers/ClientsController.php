<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;use Illuminate\Http\Request;
use App\Models\Clients;


class ClientsController extends Controller
{
    public function index()
    {
        $clientsCount = Clients::all();
        return view('clients.index', compact('clientsCount'));
    }
    public function create()
    {
        return view('clients.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:clients',
        ]);
        $clients = new Clients();
        $clients->nom = $request->nom;
        $clients->prenom= $request->prenom;
        $clients->adresse = $request->adresse;
        $clients->telephone = $request->telephone;
        $clients->email = $request->email;
        $clients->save();

        return redirect()->route('clients.index')->with('success', 'Client créé avec succès.');
    }
    public function show($id)
    {
        $clients = Clients::findOrFail($id);
        return view('clients.show', compact('clients'));
    }
    public function edit($id)
    {
        $clients = Clients::findOrFail($id);
        return view('clients.edit', compact('clients'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:clients,email,' . $id,
        ]);
        $clients = Clients::findOrFail($id);
        $clients->nom = $request->nom;
        $clients->prenom = $request->prenom;
        $clients->adresse = $request->adresse;
        $clients->telephone = $request->telephone;
        $clients->email = $request->email;
        $clients->save();

        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
    }

    public function confirmDelete($id)
    {
        $clients = Clients::findOrFail($id);
        return view('clients.supprimer', compact('clients'));
    }

    public function destroy(Clients $clients)
    {
        $this->authorize('delete', $clients);
        $clients->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}

