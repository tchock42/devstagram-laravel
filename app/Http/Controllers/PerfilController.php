<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    public function index()
    {        
        return view('perfil.index');        //  /perfil/index.blade.php
    }
    public function store(Request $request)
    {
        // modificar el request para que tenga el slug
        $request->request->add(['username' => Str::slug($request->username)]);

        // validación
        $request->validate([
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:editar-perfil'],
            'password_new' => ['required_with:password'],
            'password' => ['exclude_if:password_new,null']
        ]);
        
        if($request->hasFile('imagen') && $request->file('imagen')->isValid() ){
            $manager = new ImageManager(new Driver());      // importa la librería de Gd usando el driver de intervention/image
            $imagen = $request->file('imagen');       // accede a la propiedad "file" de la propiedad file(), lee el archivo enviado desde el formulario
            
            $nombreImagen = Str::uuid() . "." . $imagen->getClientOriginalExtension();  // accede a la extensión del archivo y lo concatena a un nombre unico

            $imagenServidor = $manager->read($imagen);  // guarda en el servidor momentaneament (se borrará pronto)
            $imagenServidor->scale(1000, 1000);
            
            $imagenesPath = public_path('perfiles') . '/' . $nombreImagen;     // agrega la imagen a /public/uploads/

            $imagenServidor->save($imagenesPath);       // guarda la imagen en disco duro del servidor
        }
        // verificar que la contraseña sea correcta
        if($request->filled('password_new')){
            if(!Auth::attempt(['email' => auth()->user()->email, 'password' => $request->password], $request->remember)){
                return back()->with('mensaje', 'Las credenciales no corresponden a un usuario registrado.');
            }
            $password_new = Hash::make($request->password_new);
        } 

        // Guardar Cambios
        $usuario = User::find(auth()->user()->id);  // busca la instancia actual de usuario en base de datos
        $usuario->username = $request->username;    // actualiza
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->password = $password_new ?? auth()->user()->password;
        $usuario->save();

        //redireccionar
        return redirect()->route('posts.index', $usuario->username)->with('aviso', 'Perfil actualizado correctamente');
    }
}
