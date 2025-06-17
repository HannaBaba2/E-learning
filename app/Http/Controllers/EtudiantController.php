<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::paginate(10);
        return view('etudiants.index', compact('etudiants'));
    }

    public function create()
    {
        return view('etudiants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'dateNaissance' => 'required|date',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'niveau' => 'required|string',
        ]);

        try {
            $user = new User();
            $user->nom = $request->input('nom');
            $user->prenom = $request->input('prenom');
            $user->dateNaissance = $request->input('dateNaissance');
            $user->telephone = $request->input('telephone');
            $user->adresse = $request->input('adresse');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            $etudiant = new Etudiant();
            $etudiant->user_id = $user->id;
            $etudiant->niveau = $request->input('niveau');
            $etudiant->save();

            return redirect()->route('etudiants.index')->with('success', 'Étudiant créé avec succès !');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de l\'inscription.']);
        }
    }

    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show', compact('etudiant'));
    }

    public function edit(Etudiant $etudiant)
    {
        return view('etudiants.edit', compact('etudiant'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'dateNaissance' => 'required|date',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'niveau' => 'required|string',
        ]);

        try {
            $etudiant = Etudiant::with('user')->findOrFail($id);
            $user = $etudiant->user;

            $user->nom = $request->input('nom');
            $user->prenom = $request->input('prenom');
            $user->dateNaissance = $request->input('dateNaissance');
            $user->telephone = $request->input('telephone');
            $user->adresse = $request->input('adresse');
            $user->email = $request->input('email');

            if ($request->input('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();

            $etudiant->niveau = $request->input('niveau');
            $etudiant->save();

            return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès !');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour.']);
        }
    }

    public function destroy($id)
    {
        try {
            $etudiant = Etudiant::with('user')->findOrFail($id);
            $user = $etudiant->user;

            $etudiant->delete();
            $user->delete();

            return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès !');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la suppression.']);
        }
    }
}
