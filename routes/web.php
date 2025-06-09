<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

Route::get('/', HomeController::class)->name('home')->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register');    // asigna un name con el metodo name
Route::post('/register', [RegisterController::class, 'store']);                     // va a tener el name del metodo get anterior

Route::get('/login', [LoginController::class, 'index'])->name('login'); // registro de usuario
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// rutas para el perfil
Route::middleware('auth')->group(function(){
    Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');
});

// dashboard
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');      // muro de usuario
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');   // endpoint para mostrar las publicaciones
Route::middleware('auth')->group(function(){       // middleware agrega protección a las rutas dentro del function
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');      // creacion de post nuevo
    Route::post('/posts', [PostController::class, 'store'])-> name('post.store');               // endpoint para el envío del formulario
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::post('/{user:username}/post/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');     // crear un comentario en post propio o de otro usuario

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');       // endpoint para el envío de imagenes, no tiene una vista

// like a fotos
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');        // agregar like
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');  // quitar like

// siguiendo a usuarios
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');
