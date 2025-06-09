@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form class="mt-10 md:mt-0"  method="POST" action="{{ route('perfil.store') }}" enctype="multipart/form-data">
                @csrf
                @if (session('mensaje')) {{-- lee el mensaje definido en PerfilController --}}
                    <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ session('mensaje') }}</p>
                @endif
                
                <div class="mb-5">          {{-- primer campo --}}
                    <label 
                        for="name" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Tu nombre de usuario" 
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}"
                    />
                    @error('username')                  {{-- directiva de validación --}}
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">          {{-- segundo campo --}}
                    <label 
                        for="password_new" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Nueva Contraseña
                    </label>
                    <input 
                        type="password" 
                        id="password_new" 
                        name="password_new" 
                        placeholder="Tu nueva contraseña" 
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value=""
                    />
                    @error('password_new')                  {{-- directiva de validación --}}
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">          {{-- tercer campo --}}
                    <label 
                        for="password" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña Actual
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Tu contraseña actual" 
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value=""
                    />
                    @error('password')                  {{-- directiva de validación --}}
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">          {{-- segundo campo --}}
                    <label 
                        for="imagen" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen Perfil
                    </label>
                    <input 
                        type="file" 
                        id="imagen" 
                        name="imagen" 
                        class="border p-3 w-full rounded-lg"
                        value=""
                        accept=".jpg, .jpeg, .png"
                    />
                </div>
                <input 
                    type="submit"
                    value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg text-center"
                >
            </form>

        </div>
    </div>
@endsection