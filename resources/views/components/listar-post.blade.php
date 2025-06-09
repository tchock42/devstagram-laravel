<div>
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['post' => $post, $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' .$post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                    </a>
                </div>
                {{-- <h1>{{$post->titulo}}</h1> --}}
            @endforeach
        </div>
        <div class="my-10">             {{-- controles del paginador --}}
            {{ $posts->links() }}
        </div>
    @else
        <h1>No hay publicaciones, sigue a alguien para poder mostrar sus publicaciones.</h1>
    @endif
</div>