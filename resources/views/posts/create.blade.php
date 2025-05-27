
@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@push('styles')             {{-- dispara este cdn solamente en esta página --}}
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush


@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            {{-- area de dropzone --}}
            <form action="{{ route('imagenes.store') }}" id="dropzone" enctype="multipart/form-data" method="POST" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">          {{-- primer campo --}}
                    <label 
                        for="titulo" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input 
                        type="text" 
                        id="titulo" 
                        name="titulo" 
                        placeholder="Titulo de la publicación" 
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"  {{-- clases para el estado de error --}}
                        value="{{ old('titulo') }}"             {{-- mantiene el valor despues de la validación --}}
                    />
                    @error('titulo')                  {{-- directiva de validación --}}
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">          {{-- Segundo campo, textarea --}}
                    <label 
                        for="descripcion" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea 
                        id="descriocion" 
                        name="descripcion" 
                        placeholder="Descripción de la publicación" 
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"  {{-- clases para el estado de error --}}
                    >{{ old('titulo') }}</textarea>

                    @error('descripcion')                  {{-- directiva de validación --}}
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input                          
                    type="submit"
                    value="Crear Publicación"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg text-center"
                >
            </form>
        </div>
    </div>
    @endsection
