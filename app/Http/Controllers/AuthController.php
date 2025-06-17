<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
    $credentials = $request->only('email', 'password');

    if (auth()->attempt($credentials)) {
        $user = auth()->user();

        if ($user->enseignant) {
            return redirect()->route('dashboard.enseignant');
        }

        if ($user->etudiant) {
            return redirect()->route('dashboard.etudiant');
        }

        auth()->logout(); // ni étudiant ni enseignant
        return redirect()->route('login.form')->withErrors([
            'email' => 'Aucun rôle associé à ce compte.',
        ]);
    }

    return back()->withErrors([
        'email' => 'Email ou mot de passe incorrect.',
    ]);
    }
}
