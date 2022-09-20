<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {  
       $imagen = $request->file('file');
        //le agrega un id a la imgen para evitar nombre duplicados

       $nombreImagen = Str::uuid() . ".jpg";
        //isntancia pra obetener difernetes propiedades
       $imagenServidor = Image::make($imagen);
       //le damos un tamaño a la imagen
       $imagenServidor->fit(1000, 1000);
        //ruta donde sera almacenada la imagen
       $imagenPath = public_path('uploads') .'/'. $nombreImagen;
       //gurdamos la imgen con la ruta creada
       $imagenServidor->save($imagenPath);

       return response()->json(['imagen' => $nombreImagen]);
    } 
}
