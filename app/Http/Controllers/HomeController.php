<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //permite proteger la URL a usuarios no autenticados
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }
    
    public function __invoke()
    {   //obtine los id de los usuarios que han posteados 
        $ids = ( auth()->user()->followings->pluck('id')->toArray());
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);
       
        //pagina principal 
        return view('home', [
            'posts'=> $posts
        ]);


    }
}