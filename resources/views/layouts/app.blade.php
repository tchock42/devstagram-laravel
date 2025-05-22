<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>  
        @vite('resources/css/app.css')
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            {{-- aqui venía css de laravel pero lo borré --}}
        @endif
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">

            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">Devstagram</h1>

                <nav class="flex gap-2 items-center">
                    <a href="/login" class="font-bold uppercase text-gray-600 text-sm">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm">
                        Crear Cuenta
                    </a>
                </nav>
            </div>
        </header>
        
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            Devstagram - Todos los derechos reservados @php echo date('Y') @endphp
        </footer>
    </body>
</html>