@extends('layouts.app')         {{-- llama al layout principal que está en /layouts/app.blade.php --}}

@section('titulo')
    Página Principal
@endsection

@section('contenido')
    <x-listar-post :posts="$posts" />   {{-- lista losposts usando el componente de Laravel --}}
@endsection