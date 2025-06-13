<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cour;
use App\Models\Enseignant;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $cours = Cour::all();
        return view('cours.index', ['cours' => $cours]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cours.create',[
            'enseignants'=>Enseignant::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'enseignant_id' => 'required|exists:enseignants,id',
        ]);

        $cour = new Cour();
        $cour->titre = $request->titre;
        $cour->description = $request->description;
        $cour->enseignant_id = $request->enseignant_id;
        $cour->save();

        return redirect()->route('cours.index')->with('success', 'Cours créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
        return view('cours.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $courId = Cour::pluck('cour_id')->random();
        $cour = Cour::find($courId);
        $enseignants = Enseignant::all();
        return view('cours.edit', [
            'cour' => $cour,
            'enseignants' => $enseignants,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cour $cour)
    {
        //
        $cour->delete();
        return redirect()->route('cours.index');
    }
}
