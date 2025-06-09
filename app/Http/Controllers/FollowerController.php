<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    
    public function store( User $user )
    {
        $user->followers()->attach(auth()->user()->id); // obtiene el id del usuario autenticado y lo añade a la lista de seguidores de de $user

        return back();
    }
    public function destroy(User $user)
    {
        $user->followers()->detach(auth()->user()->id );

        return back();
    }
}
