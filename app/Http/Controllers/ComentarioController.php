<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //metodo para enviar comentario de post
    public function store(Request $request, User $user, Post $post)
    {
        $this->validate($request, [
            'comentario' => 'required|max:255'
            
        ]);

        Comentario::create([

            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);

       return back()->with('mensaje', 'Comentario realizado correctamente');

            
    }
}
