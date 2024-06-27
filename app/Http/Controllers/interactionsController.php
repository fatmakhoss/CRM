<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\interactions;
use Illuminate\Http\Request;



class interactionsController extends Controller
{
    public function index()
    {
        $interactions = interactions::all();
        return view('interactions.index', compact('interactions'));
    }
    public function create()
    {
        return view('interactions.create');
   }
   public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'type_interaction' => 'required',
            'date_interaction' => 'required|date',
            'description' => 'required',
            'rappel' => 'nullable|date',
        ]);

    interactions::create($request->all());

        return redirect()->route('interactions.index')->with('success', 'Interaction créée avec succès.');
    }

    public function show($id)
    {
        $interaction = interactions::findOrFail($id);
        return view('interactions.show', compact('interactions'));
    }

    public function edit($id)
    {
        $interactions = interactions::findOrFail($id);
        return view('interactions.edit', compact('interactions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'type_interaction' => 'required',
            'date_interaction' => 'required|date',
            'description' => 'required',
            'rappel' => 'nullable|date',
        ]);

        $interactions = interactions::findOrFail($id);
        $interactions->update($request->all());

        return redirect()->route('interactions.index')->with('success', 'Interaction mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $interactions = interactions::findOrFail($id);
        $interactions->delete();

        return redirect()->route('interactions.index')->with('success', 'Interaction supprimée avec succès.');
    }
}

