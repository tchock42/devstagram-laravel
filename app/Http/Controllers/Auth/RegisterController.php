<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function index()
    {
        return view('auth.register');           // entra a la carpeta auth en views y lee register
    }

    public function store(Request $request)     // request actua de manera similar que $_SERVER['REQUEST_METHOD']
    {
        // dd($request->get('username'));   

        // Modificar el request para que primero se genere el slug del username
        $request->request->add(['username' => Str::slug($request->username)]); // reescribe el key 'username' con el username en forma de slug

        // validación
        $request->validate([
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20', // valida que el slug sea unico
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        //si se pasa la validación guarda en la base de datos
        User::create([
            'name' => $request->name,
            'username' => $request->username,               
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // autenticar
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            // redireccionar
            return redirect()->route('posts.index', auth()->user()->username)->with('aviso', 'Cuenta creada correctamente');  // el argumento de ruta siempre se debe colocar el alias
        }
        // si no se autentica el usuario
        return back()->withErrors([
            'email' => 'Las credenciales dadas no corresponden a un usuario registrado'
        ]);

    }
}
