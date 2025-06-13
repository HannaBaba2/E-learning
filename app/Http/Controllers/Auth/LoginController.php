<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    //


    public function login(){
        return view('auth.login');
    }
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        //On valide les données
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Vérifie si le user exist
 
        if (Auth::attempt($credentials)) {
            //dump(Auth::attempt($credentials));
            //dd(Auth::user());

            $request->session()->regenerate();
            return redirect()->intended('cours');
        }
 
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent à aucun compte enregistré.',
        ])->onlyInput('email');
    }
    /**
     * Log the user out of the application
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/cours');
    }
}
