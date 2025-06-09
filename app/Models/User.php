<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Like;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [     // informacion que se va a llenar en la base de datos
        'name',
        'email',
        'password',
        'username'          // nuevo campo para el username
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function posts() // relacion de uno a muchos
    {
        return $this->hasMany(Post::class);
    }
	// vincula al usuario con sus likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // $this es la instancia del usuario de la vista
    public function followers() // declara una relación de muchos a muchos en la tabla followers donde user_id es el seguido y follower el que sigue
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id'); // relacion de uno pertenece a muchos (seguidores) de la tabla followers y sus foreignId
    }

    // revisar si un usuario ya sigue a otro
    public function siguiendo(User $user)   // user es la instancia del usuario autenticado
    {
        //retorna bool
        return $this->followers->contains($user->id);        // retorna si un usuario ya sigue a otro, contains itera en la tabla followers buscando al usuario de la vista actual
        // el usuario de la vista contiene como seguir al usuario que en la vista se llama auth() y está autenticado
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }
}
