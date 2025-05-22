
@extends('layouts.app')

@section('titulo')
    Regístrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5"> {{-- ocupa la mitad del espacio disponible --}}
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen de registro de usuarios">
        </div>    

        <div class="md:w-4/12">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">          {{-- primer campo --}}
                    <label 
                        for="name" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        placeholder="Tu nombre" 
                        class="border p-3 w-full rounded-lg"
                    />
                    {{-- directiva de validación --}}
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lh text-sm text-center">{{ $message}}</p>
                    @enderror
                </div>
                <div class="mb-5">          {{-- segundo campo --}}
                    <label 
                        for="username" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Tu nombre de usuario" 
                        class="border p-3 w-full rounded-lg">
                </div>
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
                        class="border p-3 w-full rounded-lg">
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
                        class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">          {{-- quinto campo --}}
                    <label 
                        for="password_confirmation" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Contraseña
                    </label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        placeholder="Repite la contraseña" 
                        class="border p-3 w-full rounded-lg">
                </div>
                <input 
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg text-center"
                >
            </form>
        </div>
    </div>
@endsection