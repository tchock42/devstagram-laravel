<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');               // lee la vista principal.blade.php en /views
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');    // asigna un name con el metodo name
Route::post('/register', [RegisterController::class, 'store']);                     // va a tener el name del metodo get anterior
