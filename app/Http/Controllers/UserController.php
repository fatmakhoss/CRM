<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs =User::all();
        return view('user.index', compact('user'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_utilisateur' => 'required|string|max:255',
            'mot_de_passe' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:utilisateurs',
        ]);
        User::create([
            'nom_utilisateur' => $request->nom_utilisateur,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
            'email' => $request->email,
        ]);

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $utilisateur =User::findOrFail($id);
        return view('utilisateurs.show', compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $utilisateur = User::findOrFail($id);
        return view('utilisateurs.edit', compact('utilisateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom_utilisateur' => 'required|string|max:255',
            'mot_de_passe' => 'nullable|string|min:8',
            'email' => 'required|string|email|max:255|unique:utilisateurs,email,'.$id,
        ]);
        $utilisateur = User::findOrFail($id);
        $utilisateur->nom_utilisateur = $request->nom_utilisateur;
        if ($request->filled('mot_de_passe')) {
            $utilisateur->mot_de_passe = Hash::make($request->mot_de_passe);
        }
        $utilisateur->email = $request->email;
        $utilisateur->save();

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $utilisateur = User::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}

