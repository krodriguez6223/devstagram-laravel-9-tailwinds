<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    //permite proteger la URL a usuarios no autenticados
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    //dirige al formulario para editar el perfil de usuario
    public function index()
    {
        return view('perfil/index'); 
    }
    //actualizar datos de perfil
    public function store(Request $request)
    { 
        


      //valida desde la base de datos para evitar usuarios repetidos
      $request->request->add(['username' => Str::slug($request->username)]);
      
      //le pasamos el username para en caso de no cambiar el username mantenga el existente
      $this->validate($request, ['username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:editar-perfil'],
                                    'email' => ['required', 'unique:users,email,'.auth()->user()->id, 'max:60'],
                                   
                                  
                                  
    ]);

    
    if($request->imagen) 
    {
        
        $imagen = $request->file('imagen');
        //le agrega un id a la imgen para evitar nombre duplicados

       $nombreImagen = Str::uuid() . ".jpg";
        //isntancia pra obetener difernetes propiedades
       $imagenServidor = Image::make($imagen);
       //le damos un tamaño a la imagen
       $imagenServidor->fit(1000, 1000);
        //ruta donde sera almacenada la imagen
       $imagenPath = public_path('perfiles') .'/'. $nombreImagen;
       //gurdamos la imgen con la ruta creada
       $imagenServidor->save($imagenPath);
    }
    
    
    // guardar cambios
    $usuario = User::find(auth()->user()->id);
    $usuario->username = $request->username;
    $usuario->email =  $request->email;
    //condicional en caso los datos de login son incorrectos
    $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;    

    if($request->password){
        //condicional en caso los datos de login son incorrectos
        if (!auth()->attempt($request->only('email', 'password'), $request->remenber)) {
           
            return back()->with('mensaje', 'Password incorrecta');
       }else{
           $this->validate($request,  ['newPass' => ['required', 'min:6']]);
           $usuario->password =  Hash::make($request->newPass);
       }
    }
    $usuario->save();

    //redireccionar
    return redirect()->route('posts.index', $usuario->username);

   }
}//finde clase