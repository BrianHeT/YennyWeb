<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // TODO: validar
        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials)){
            return redirect()
                ->intended(route('books.index'))
                ->with('feedback.message', 'Sesion Iniciada con Exito');
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('feedback.message', 'las credenciales ingresadas son incorrectas');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.login')
            ->with('feedback.message', 'Sesion Cerrada con Exito');

    }
}