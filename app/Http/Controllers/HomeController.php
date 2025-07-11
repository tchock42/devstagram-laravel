<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // en '/' se muestras las publicaciones de las cuentas a las que se sigue
    public function __invoke()
    {
        // obtener a quienes se sigue
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        
        return view('home', [
            'posts' => $posts
        ]
        
    );
    }
}
