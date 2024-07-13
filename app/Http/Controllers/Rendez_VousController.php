<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rendezVousList = RendezVous::all();
        return view('rendez_vous.index', compact('rendezVousList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rendez_vous.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_rendez_vous' => 'required|date',
            'lieu' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        RendezVous::create($validatedData);

        return redirect()->route('rendez_vous.index')->with('success', 'Rendez-vous créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rendezVous = RendezVous::findOrFail($id);
        return view('rendez_vous.show', compact('rendezVous'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rendezVous = RendezVous::findOrFail($id);
        return view('rendez_vous.edit', compact('rendezVous'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_rendez_vous' => 'required|date',
            'lieu' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $rendezVous = RendezVous::findOrFail($id);
        $rendezVous->update($validatedData);

        return redirect()->route('rendez_vous.index')->with('success', 'Rendez-vous mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rendezVous = RendezVous::findOrFail($id);
        $rendezVous->delete();

        return redirect()->route('rendez_vous.index')->with('success', 'Rendez-vous supprimé avec succès');
    }
}
