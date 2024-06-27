<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use Illuminate\Http\Request;
use App\Models\RendezVous;

class RendezVousController extends Controller
{
    public function index()
    {
        $rendezVous = RendezVous::all();
        return view('rendez_vous.index', compact('rendezVous'));
    }

    public function create()
    {
        $clients = Clients::all();
        return view('rendez_vous.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_rendez_vous' => 'required|date',
            'lieu' => 'required|string|max:255',
            'description' => 'required',
        ]);

        RendezVous::create($request->all());

        return redirect()->route('rendez_vous.index')->with('success', 'Rendez-vous créé avec succès.');
    }

    public function show($id)
    {
        $rendezVous = RendezVous::findOrFail($id);
        return view('rendez_vous.show', compact('rendezVous'));
    }

    public function edit($id)
    {
        $rendezVous = RendezVous::findOrFail($id);
        $clients = Clients::all();
        return view('rendez_vous.edit', compact('rendezVous', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_rendez_vous' => 'required|date',
            'lieu' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $rendezVous = RendezVous::findOrFail($id);
        $rendezVous->update($request->all());

        return redirect()->route('rendez_vous.index')->with('success', 'Rendez-vous mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $rendezVous = RendezVous::findOrFail($id);
        $rendezVous->delete();

        return redirect()->route('rendez_vous.index')->with('success', 'Rendez-vous supprimé avec succès.');
    }
}
