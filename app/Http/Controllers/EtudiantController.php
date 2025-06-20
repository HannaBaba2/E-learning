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
        $etudiants = Etudiant::with('user')->paginate(10);
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
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'niveau' => 'required|string|max:255',
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
            $etudiant->user_id = $user->user_id; 
            $etudiant->niveau = $request->input('niveau');
            $etudiant->save();

            \Auth::login($user);

            return redirect()->route('login')->with('success', 'Étudiant créé avec succès !');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erreur lors de l\'inscription . ']);
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

    public function update(Request $request,Etudiant $etudiant)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'dateNaissance' => 'required|date',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'niveau' => 'required|string|max:255',
        ]);

        try {
            $user = $etudiant->user;
            $user->nom = $request->input('nom');
            $user->prenom = $request->input('prenom');
            $user->dateNaissance = $request->input('dateNaissance');
            $user->telephone = $request->input('telephone');
            $user->adresse = $request->input('adresse');
            $user->email=$request->input('email');
            $user->password=$request->input('password');


            $user->save();

            $etudiant->niveau = $request->input('niveau');
            $etudiant->save();

            return redirect()->route('etudiants.index')->with('success', 'Etudiant mis à jour avec succès.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour.']);
        }
    }

    public function destroy(Etudiant $etudiant)
    {
        try {
            $etudiant->delete();
            return redirect()->route('etudiants.index')->with('success', 'Etudiant supprimé avec succès !');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la suppression.']);
        }
    }

    public function dashboard()
    {
        $etudiant = auth()->user()->etudiant;
        $coursInscrits = $etudiant->cour ?? [];
        return view('etudiants.dashboard', compact('coursInscrits'));
    }
}
