<?php

namespace App\Livewire;

use Livewire\Component;

class Commonareas extends Component
{
    public function render()
    {
        return view('livewire.commonareas.view',[
            'commonareas' => commonarea::latest()->get(),
        ]);
    }
}
