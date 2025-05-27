<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        // validar el formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // autenticar
        if(!Auth::attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('mensaje', 'Las credenciales no corresponden a un usuario registrado.');
        }

        // si se autentica correctamente
        return redirect()->route('posts.index', [$request->user()->username ]);  // indica el username para insertarlo en la url | tambien funciona auth()->user()->username
    }
}
