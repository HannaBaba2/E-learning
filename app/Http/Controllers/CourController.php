<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cour;
use App\Models\Enseignant;
use Illuminate\Support\Facades\Storage;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours = Cour::with('enseignant')->paginate(10);
        return view('cours.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enseignants = Enseignant::all();
        return view('cours.create', compact('enseignants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'fichier' => 'required|file|mimes:pdf,doc,docx,png,jpeg',
        ]);

        try {
            $cours = new Cour();
            $cours->titre = $request->input('titre');
            $cours->description = $request->input('description');

            if ($request->hasFile('fichier')) {
                $cours->fichier = $request->file('fichier')->store('cours');
            }

            $cours->enseignant_id = auth()->user()->enseignant->enseignant_id;
            $cours->save();

            return redirect()->route('cours.index')->with('success', 'Cours ajouté avec succès !');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erreur lors de l\'ajout du cours : ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cour $cour)
    {
        $cour->load('enseignant');
        return view('cours.show', compact('cour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cour $cour)
    {
        $cour->load('enseignant');
        $enseignants = Enseignant::all();
        return view('cours.edit', compact('cour', 'enseignants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cour $cour)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'fichier' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        try {
            $cour->titre = $request->input('titre');
            $cour->description = $request->input('description');

            if ($request->hasFile('fichier')) {
                if ($cour->fichier) {
                    Storage::delete($cour->fichier);
                }
                $cour->fichier = $request->file('fichier')->store('cours');
            }

            $cour->save();

            return redirect()->route('cours.index')->with('success', 'Cours mis à jour avec succès !');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erreur lors de la mise à jour du cours : ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(Cour $cour)
    {
        try {
            if ($cour->fichier) {
                Storage::delete($cour->fichier);
            }
            $cour->delete();

            return redirect()->route('cours.index')->with('success', 'Cours supprimé avec succès !');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erreur lors de la suppression du cours : ' . $e->getMessage()]);
        }
    }

    /**
     * Display the dashboard for the authenticated teacher.
     */
    public function dashboard()
    {
        $enseignant = auth()->user()->enseignant;
        $cours = $enseignant->cours;

        return view('cours.dashboard', compact('cours'));
    }
}