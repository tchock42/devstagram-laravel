<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    use AuthorizesRequests;
    // dashboard
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(20); // where realiza la consulta y get trae los resultados
       
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
    public function create()
    {    
        
        return view('posts.create');
    }
    public function store(Request $request)
    {
        //reglas de validación con el array asociativo
        $request->validate([
            'titulo'=>'required|max:255',
            'descripcion'=> 'required',
            'imagen' => 'required'
        ]);

        // Post::create([          // crea la instancia, almacena en memoria y guarda en la base de datos
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id
        // ]);

        // otra forma de crear registros
        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        // crear registros usando el modelo de relaciones de la clase User con el metodo posts()
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);


        return redirect()->route('posts.index', auth()->user()->username);

    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        // eliminar la imagen
        $imagenesPath = public_path('uploads') . '/' . $post->imagen;
        if(File::exists($imagenesPath)){
            unlink($imagenesPath);
        }
        
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
