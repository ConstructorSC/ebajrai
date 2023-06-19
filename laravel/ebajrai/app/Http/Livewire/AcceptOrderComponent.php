<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AcceptOrderComponent extends Component
{
    public function render()
    {
        return view('livewire.accept-order-component')->layout("layouts.base");
    }
}
