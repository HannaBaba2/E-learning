<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function redirect()
    {
        $user = Auth::user();

        if ($user->statut === 'enseignant') {
            return redirect()->route('enseignant.dashboard');
        } elseif ($user->statut === 'etudiant') {
            return redirect()->route('etudiant.dashboard');
        }

        return redirect('/');
    
    }

}
