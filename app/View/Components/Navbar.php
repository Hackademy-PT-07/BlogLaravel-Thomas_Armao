<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $navLinks;

    public function __construct()
    {
        $this->navLinks= [
            'Home' => route('homepage'),
            'Articoli' => route('articles'),
            'Contatti' => route('contacts'),
            'Chi siamo' => route('aboutUs'),
            'Anime'=> route('anime.index'),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
