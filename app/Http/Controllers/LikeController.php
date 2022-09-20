<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class LikeController extends Controller
{
    //insertar like
    public function store(Request $request, Post $post)
   {
        
        $post->likes()->create([

            'user_id' => $request->user()->id
        ]);
        return back();
   }

   //eliminar like de una publicacion
   public function destroy(Request $request, Post $post) 
    {
     $request->user()->likes()->where('post_id', $post->id)->delete();
     return back(); 
    }
   
}