<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;


    protected $fillable = [             // informacion que se va a llenar en la base de datos
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];
    
    public function user()              // relacion de muchos a uno
    {
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    // revisar si el usuario actual ya dio like
    public function checklike(User $user)
    {
        return $this->likes->contains('user_id', $user->id);    // verifica que en la columna 'user_id' se tenga un registro con el user_id actual
    }
}
