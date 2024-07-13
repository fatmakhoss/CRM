<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use App\Models\Leads;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $leadsCount =Leads::all();
        return view('leads.index', compact('leadsCount'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('leads.create', compact('clients'));
    }

    // Store a newly created resource in storage
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

    // Display the specified resource
    public function show($id)
    {$lead = Leads::findOrFail($id);
        return view('leads.show', compact('lead'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $clients = Clients::all();
        $lead = Leads::findOrFail($id);
        return view('leads.edit', compact('clients','lead'));
    }

    // Update the specified resource in storage
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

    // Remove the specified resource from storage
    public function destroy(Leads $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Lead supprimé avec succès');
    }
}
