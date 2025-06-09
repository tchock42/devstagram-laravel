<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;                           // referencia a la instancia del post actual
    public $isLiked;                        // bool 
    public $likes;

    public function mount($post)    // revisa si ya se dio like al post
    {
        // $this->post = $post;
        $this->isLiked= $post->checkLike(auth()->user());           // checkLike retorna bool si ya se dio Like o no
        $this->likes = $post->likes()->count();
    }

    public function like()
    {
        if($this->post->checkLike( auth()->user() )){   // si ya se le dio like
            
            $this->post->likes()->where('post_id', $this->post->id)->where('user_id', auth()->user()->id)->delete();
            $this->isLiked = false;                  // actualiza el estado de isLiked
            $this->likes--;                          // quita un like

        }else{                                          // si aun no hay like
            $this->post->likes()->create([              // guarda en la base de datos
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;                      // actualiza el estado de isLiked 
            $this->likes++;                             // aumenta los likes
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
