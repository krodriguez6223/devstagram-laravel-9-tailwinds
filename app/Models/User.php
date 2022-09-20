<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //relacion de un usuario con multiples posts 'Publicaciones' 1:N hasMany()
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    //un usurio puede tener multiples likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
     //almacena los seguidores de un usuario
     public function followers()
     {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
     }
     //almacena los que seguimos
     public function followings()
     {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
     }
         //Comprobar si un usuario ya sigu a otro
    public function siguiendo(User $user)
    {
        return $this->followers->contains( $user->id);
    }

}