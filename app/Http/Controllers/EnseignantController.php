<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignant;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;


class EnseignantController extends Controller
{
    public function index()
    {
        $enseignants = Enseignant::with('user')->paginate(10);
        return view('enseignants.index', compact('enseignants'));
    }


    public function create()
    {
        return view('enseignants.create');
    }

    public function store(Request $request)
    {     
        //dd($request->all());
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'dateNaissance' => 'required|date',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'specialite' => 'nullable|string',
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

            $enseignant = new Enseignant();
            $enseignant->user_id = $user->user_id; 
            $enseignant->specialite = $request->input('specialite');
            $enseignant->save();

            \Auth::login($user);

            return redirect()->route('login')->with('success', 'Inscription réussie !');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de l\'inscription.']);
       
                }
    }

    public function show(Enseignant $enseignant)
    {
        return view('enseignants.show', compact('enseignant'));
    }

    public function edit(Enseignant $enseignant)
    {
        return view('enseignants.edit', compact('enseignant'));
    }

    public function update(Request $request, Enseignant $enseignant)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'dateNaissance' => 'required|date',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'specialite' => 'nullable|string',
            
        ]);

        try {
            $user = $enseignant->user;
            $user->nom = $request->input('nom');
            $user->prenom = $request->input('prenom');
            $user->dateNaissance = $request->input('dateNaissance');
            $user->telephone = $request->input('telephone');
            $user->adresse = $request->input('adresse');
            $user->email=$request->input('email');
            $user->password=$request->input('password');
            $user->save();

            // Mettre à jour la spécialité de l'enseignant
            $enseignant->specialite = $request->input('specialite');
            $enseignant->save();

            return redirect()->route('enseignants.index')->with('success', 'Enseignant mis à jour avec succès.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour.']);
        }
    }

    public function destroy(Enseignant $enseignant)
    {
        try {
            $enseignant->delete();
            return redirect()->route('enseignants.index')->with('success', 'Enseignant supprimé avec succès !');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la suppression.']);
        }
    }

    public function dashboard()
    {
        $enseignant = auth()->user()->enseignant;

        $cours = $enseignant->cours;

        return view('enseignants.dashboard', compact('cours'));
    }

}
