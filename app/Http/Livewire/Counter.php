<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 8;
    public function increment()
    {
        $this->count = $this->count + 1;
    }

    public function decrement()
    {
        if ($this->count > 3) {
            $this->count--;
        }
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
