<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HowToBuy extends Component
{
    public function render()
    {
        return view('livewire.how-to-buy')->layout('layouts.home');
    }
}
