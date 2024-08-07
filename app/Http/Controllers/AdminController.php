<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard()
    {
        return view('Admin.dashboard');
    }

    public function index()
    {
        $users = Users::all();
        return view('Admin.users.index',compact('users'));
    }
    public function usersedit($id)
    {
        $user = Users::findOrFail($id);
        return view('Admin.users.edit', compact('user'));
    }

    public function usersupdate(Request $request, $id)
    {
        $request->validate([
            'nom_utilisateur' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = Users::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('Admin.users.index')->with('success', 'Utilisateur créé avec succès.');    }
    public function indexsettings()
    {
        $users=Users::all();

        return view('Admin.setting.index',compact('users'));
    }

    public function admin()
    {
        return view('admin.dashboard');
    }
    public function getcontact(){

    }
}
