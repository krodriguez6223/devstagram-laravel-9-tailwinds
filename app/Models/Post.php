<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
    ];

    //relacion de un post a un usuario
    public function user()
    {
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }
    
    //relacion de un post con muchos comentarios
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
    //relacion de like de muchos usuarios pueden dar 1 like
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    //funcion para validar si un usuario ya dio like
    public function checkLike(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}