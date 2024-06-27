<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;use App\Models\Contrats;
use Illuminate\Http\Request;

class ContratsController extends Controller
{
    public function index()
    {
        $contrats = Contrats::all();
        return response()->json($contrats);
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'numero_contrat' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'details' => 'required|string',
        ]);

        $contrat = Contrats::create($request->all());
        return response()->json($contrat, 201);
    }

    public function show($id)
    {
        $contrat = Contrats::findOrFail($id);
        return response()->json($contrat);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'numero_contrat' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'details' => 'required|string',
        ]);

        $contrat = Contrats::findOrFail($id);
        $contrat->update($request->all());
        return response()->json($contrat, 200);
    }

    public function destroy($id)
    {
        $contrat = Contrats::findOrFail($id);
        $contrat->delete();
        return response()->json(null, 204);
    }
}


