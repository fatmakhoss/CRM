<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use App\Models\Leads;
use Illuminate\Http\Request;

class LeadsController extends Controller
{

    public function index()
    {
        $leadsCount =Leads::all();
        return view('leads.index', compact('leadsCount'));
    }


    public function create()
    {
        return view('leads.create', compact('clients'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date' => 'required|date',
            'lieu' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Leads::create($validatedData);

        return redirect()->route('leads.index')->with('success', 'Lead créé avec succès');
    }


    public function show($id)
    {$lead = Leads::findOrFail($id);
        return view('leads.show', compact('lead'));
    }


    public function edit($id)
    {
        $clients = Clients::all();
        $lead = Leads::findOrFail($id);
        return view('leads.edit', compact('clients','lead'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date' => 'required|date',
            'lieu' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $lead = Leads::findOrFail($id);
        $lead->update($request->all());

        return redirect()->route('leads.index')->with('success', 'Lead mis à jour avec succès');
    }

 
    public function destroy(Leads $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Lead supprimé avec succès');
    }
}
