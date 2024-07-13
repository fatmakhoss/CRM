<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Clients;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=Users::all();
        return view('users.index', compact('users'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
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
        Users::create([
            'nom_utilisateur' => $request->Nom_utilisateur,
            'mot_de_passe' => Hash::make($request->password),
            'email' => $request->email,
        ]);

        return redirect()->route('users.index')->with('success', 'User créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users =Users::findOrFail($id);
        return view('users.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = Users::findOrFail($id);
        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $users = Users::findOrFail($id);


        $validatedData = $request->validate([
            'nom_utilisateur' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs,email,' . $users->id,
            'mot_de_passe' => 'nullable|string|min:8',
        ]);

        $users->nom_utilisateur = $validatedData['nom_utilisateur'];
        $users->email = $validatedData['email'];

        if (!empty($validatedData['mot_de_passe'])) {
            $users->mot_de_passe = bcrypt($validatedData['mot_de_passe']);
        }

        $users->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users= Users::findOrFail($id);
        $users->delete();

        return redirect()->route('users.index')->with('success', 'User supprimé avec succès.');
    }
}

