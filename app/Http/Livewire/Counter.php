<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $like = 0;

    public function increment()
    {
        $this->like++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
