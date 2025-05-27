<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');               // lee la vista principal.blade.php en /views
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');    // asigna un name con el metodo name
Route::post('/register', [RegisterController::class, 'store']);                     // va a tener el name del metodo get anterior

Route::get('/login', [LoginController::class, 'index'])->name('login'); // registro de usuario
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index')->middleware('auth'); // auth solo usuarios autenticados pueden acceder a la ruta /muro
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');      // creacion de post nuevo

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');       // endpoint para el envío de imagenes