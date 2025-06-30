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
    $enseignants = Enseignant::all();
    return view('cours.create', compact('enseignants'));
}


    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{

    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'enseignant_id' => 'required|exists:enseignants,enseignant_id',
    ]);

    $cour = Cour::create($validated);

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
   public function edit($id)
{
    $cour = Cour::findOrFail($id);
    $enseignants = Enseignant::all();
    return view('cours.edit', compact('cour', 'enseignants'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'enseignant_id' => 'required|exists:enseignants,enseignant_id',
    ]);

    $cour = Cour::findOrFail($id);

    $cour->update($validated);

    return redirect()->route('cours.index')->with('success', 'Cours mis à jour avec succès.');
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
