<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\interactions;
use App\Models\Clients;
use Illuminate\Http\Request;



class interactionsController extends Controller
{
    public function index()
    {
        $interactionsCount = interactions::all();
        return view('interactions.index', compact('interactionsCount'));
    }

public function create()  {
    $clients = Clients::all();
    return view('interactions.create', compact('clients'));
}

public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'type' => 'required|String|max:255',
            'date' => 'required|Date',
            'description' => 'required',
            'rappel' => 'nullable|date',
        ]);
        $interaction = interactions::create($request->all());
        return redirect()->route('interactions.index')->with('success', 'Interaction créée avec succès.');
    }

    public function show($id)
    {
        $interactions = interactions::findOrFail($id);
        return view('interactions.show',compact('interactions'));
    }

    public function edit($id)
    {
        $interaction = interactions::findOrFail($id);
        $clients = Clients::all();
        return view('interactions.edit', compact('interaction'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'type' => 'required |string|max:255',
            'date' => 'required|date',
            'description' => 'required',
            'rappel' => 'nullable|date',
        ]);

        $interactions = interactions::findOrFail($id);
        $interactions->update($request->all());

        return redirect()->route('interactions.index')->with('success', 'Interaction mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $interaction = interactions::findOrFail($id);
        $interaction->delete();

        return redirect()->route('interactions.index')->with('success', 'Interaction supprimée avec succès');
    }

    public function confirmDestroy($id)
    {
        $interaction = interactions::findOrFail($id);
        return view('interactions.destroy', compact('interaction'));
    }
}

