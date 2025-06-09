<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListarPost extends Component
{
    public $posts;                          // crea la propiedad posts

    public function __construct($posts)     // le llega la instacia de $posts con las publicaciones
    {
        $this->posts = $posts;              // le asigna el valor de $posts a la propiedad $posts de la clase ListarPost
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.listar-post');
    }
}
