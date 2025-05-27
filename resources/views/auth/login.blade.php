
@extends('layouts.app')

@section('titulo')
    Inicia sesión en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5"> {{-- ocupa la mitad del espacio disponible --}}
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen de login de usuarios">
        </div>    

        <div class="md:w-4/12 w-11/12 mx-auto">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                @if (session('mensaje')) {{-- lee el mensaje definido en LoginController --}}
                    <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ session('mensaje') }}</p>
                @endif
                <div class="mb-5">          {{-- tercer campo --}}
                    <label 
                        for="email" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Tu correo de registro" 
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('email') }}"
                    >
                    @error('email')                  {{-- directiva de validación --}}
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">          {{-- cuarto campo --}}
                    <label 
                        for="password" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Contraseña de registro" 
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    >
                    @error('password')                  {{-- directiva de validación --}}
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="text-gray-500 text-sm">Mantener mi sesión abierta</label>
                </div>

                <input 
                    type="submit"
                    value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg text-center"
                >
            </form>
        </div>
    </div>
@endsection