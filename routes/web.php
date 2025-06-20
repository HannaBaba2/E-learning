<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CourController;

// Route d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Routes d'authentification
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes pour les étudiants
Route::prefix('etudiants')->group(function () {
    Route::get('/', [EtudiantController::class, 'index'])->name('etudiants.index');
    Route::get('create', [EtudiantController::class, 'create'])->name('etudiants.create');
    Route::post('/', [EtudiantController::class, 'store'])->name('etudiants.store');
    Route::get('{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');
    Route::get('{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit');
    Route::put('{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.update');
    Route::delete('{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');
});

// Routes pour les enseignants
Route::prefix('enseignants')->group(function () {
    Route::get('/', [EnseignantController::class, 'index'])->name('enseignants.index');
    Route::get('create', [EnseignantController::class, 'create'])->name('enseignants.create');
    Route::post('/', [EnseignantController::class, 'store'])->name('enseignants.store');
    Route::get('{enseignant}', [EnseignantController::class, 'show'])->name('enseignants.show');
    Route::get('{enseignant}/edit', [EnseignantController::class, 'edit'])->name('enseignants.edit');
    Route::put('{enseignant}', [EnseignantController::class, 'update'])->name('enseignants.update');
    Route::delete('{enseignant}', [EnseignantController::class, 'destroy'])->name('enseignants.destroy');
});

 Route::middleware(['auth'])->group(function () {
     Route::get('/enseignant/dashboard', [EnseignantController::class, 'dashboard'])->name('enseignants.dashboard');
//     Route::get('/enseignant/cours/ajouter', [EnseignantController::class, 'ajouter'])->name('enseignant.cours.ajouter');
//     Route::post('/enseignant/cours/ajouter', [EnseignantController::class, 'store'])->name('enseignant.cours.store');

    // Routes pour le tableau de bord de l'étudiant
    Route::get('/etudiant/dashboard', [EtudiantController::class, 'dashboard'])->name('etudiants.dashboard');
    Route::post('/etudiant/cours/{id}/inscrire', [EtudiantController::class, 'inscrire'])->name('etudiants.cours.inscrire');

    // Routes pour les cours
    Route::get('/cours', [CourController::class, 'index'])->name('cours.index');
    Route::get('/cours/create', [CourController::class, 'create'])->name('cours.create');
    Route::post('/cours', [CourController::class, 'store'])->name('cours.store');
    Route::get('/cours/{id}', [CourController::class, 'show'])->name('cours.show'); // Afficher un cours
    Route::get('/cours/{id}/edit', [CourController::class, 'edit'])->name('cours.edit'); // Modifier un cours
    Route::put('/cours/{id}', [CourController::class, 'update'])->name('cours.update'); // Mettre à jour un cours
    Route::delete('/cours/{id}', [CourController::class, 'destroy'])->name('cours.destroy'); // Supprimer un cours
});
