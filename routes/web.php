<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CoursController;
use Illuminate\Support\Facades\Auth;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Routes de connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes pour les étudiants
Route::prefix('etudiants')->group(function () {
    Route::get('/', [EtudiantController::class, 'index'])->name('etudiants.index');
    Route::get('{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');
    Route::get('{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit');
    Route::put('{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.update');
    Route::delete('{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');
});

// Routes pour les enseignants
Route::prefix('enseignants')->group(function () {
    //Route::get('/', [EnseignantController::class, 'index'])->name('enseignants.index');
    Route::get('{enseignant}/create', [EnseignantController::class, 'create'])->name('enseignants.create');
    Route::get('{enseignant}', [EnseignantController::class, 'show'])->name('enseignants.show');
    Route::get('{enseignant}/edit', [EnseignantController::class, 'edit'])->name('enseignants.edit');
    Route::put('{enseignant}', [EnseignantController::class, 'update'])->name('enseignants.update');
    Route::delete('{enseignant}', [EnseignantController::class, 'destroy'])->name('enseignants.destroy');

    // Ajout des routes pour créer un enseignant
    Route::get('create', [EnseignantController::class, 'create'])->name('enseignants.create');
    Route::post('/', [EnseignantController::class, 'store'])->name('enseignants.store');
});

// Routes pour le tableau de bord
Route::middleware(['auth'])->group(function () {
    Route::get('/enseignant/dashboard', [EnseignantController::class, 'dashboard'])->name('enseignant.dashboard');
    Route::get('/enseignant/cours/ajouter', [EnseignantController::class, 'ajouter'])->name('enseignant.cours.ajouter');
    Route::post('/enseignant/cours/ajouter', [EnseignantController::class, 'store'])->name('enseignant.cours.store');

    Route::get('/etudiant/dashboard', [EtudiantController::class, 'dashboard'])->name('etudiant.dashboard');
    Route::post('/etudiant/cours/{id}/inscrire', [EtudiantController::class, 'inscrire'])->name('etudiants.cour.inscrire');

    Route::get('/cours', [CoursController::class, 'index'])->name('cours.index');
});
