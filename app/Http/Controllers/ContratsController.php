<?php

namespace App\Http\Controllers;use Illuminate\Http\Request;
use App\Models\Contrats;
use App\Models\Clients;

class ContratsController extends Controller
{

    public function index()
    {
        $contratsCount= Contrats::with('client')->get();
        return view('contrats.index', compact('contratsCount'));
    }

    public function create()
    {
        $clients = Clients::all();
        return view('contrats.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'numero_contrat' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'details' => 'nullable|string',
        ]);

        $contrat = Contrats::create($request->all());
        return redirect()->route('contrats.index')->with('success', 'Contrat créé avec succès.');
    }

    public function show($id)
    {
        $contrat = Contrats::findOrFail($id);
        return view('contrats.show', compact('contrat'));
    }

    public function edit($id)
    {
        $contrat = Contrats::findOrFail($id);
        $clients = Clients::all();
        return view('contrats.edit', compact('contrat', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'numero_contrat' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'details' => 'nullable|string',
        ]);

        $contrat = Contrats::findOrFail($id);
        $contrat->update($request->all());
        return redirect()->route('contrats.index')->with('success', 'Contrat mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $contrat = Contrats::findOrFail($id);
        $contrat->delete();
        return redirect()->route('contrats.index')->with('success', 'Contrat supprimé avec succès.');
    }
}


