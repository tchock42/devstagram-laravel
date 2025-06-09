<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $manager = new ImageManager(new Driver());      // importa la librería de Gd usando el driver de intervention/image
        $imagen = $request->file('file');       // accede a la propiedad "file" de la propiedad file(), lee el archivo enviado desde el formulario
        
        $nombreImagen = Str::uuid() . "." . $imagen->extension();  // accede a la extensión del archivo y lo concatena a un nombre unico

        $imagenServidor = $manager->read($imagen);  // guarda en el servidor momentaneament (se borrará pronto)
        $imagenServidor->scale(1000, 1000);
        
        $imagenesPath = public_path('uploads') . '/' . $nombreImagen;     // agrega la imagen a /public/uploads/

        $imagenServidor->save($imagenesPath);       // guarda la imagen en disco duro del servidor

        return response()->json(['imagen' => $nombreImagen]);      // retorna una respuesta
    }
}
