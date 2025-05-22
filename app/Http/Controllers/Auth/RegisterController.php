<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function index()
    {
        return view('auth.register');           // entra a la carpeta auth en views y lee register
    }

    public function store(Request $request)
    {
        // dd($request->get('username'));

        // validación
        $request->validate([
            'name' => 'required|min:5'
        ]);
        
    }
}
