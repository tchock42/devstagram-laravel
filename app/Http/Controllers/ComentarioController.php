<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    
    public function store(Request $request, User $user, Post $post)
    {
        //validar
        $request->validate([
            'comentario' => 'required|max:255'
        ]);

        //guardar
        Comentario::create([
            'user_id' => auth()->user()->id,        // extrae el usuario autenticado de auth(), no del dueño del post
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);

        // imprimir respuesta
        return back()->with('mensaje', 'Comentario realizado correctamente');
    }
}
